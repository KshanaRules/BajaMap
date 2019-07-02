"""
ds.analysed_sst[0]
ds.lat
ds.lon


lat = -79.995 a 79.995      
lat = -179.995 a 179.995 

 _ _ _ _ _ _ _ _ _ 
| i    lat    lon   |     Dim
| 0    -80    -180  |   lat = 17
| 1    -70    -170  |   lon = 37
| 2    -60    -160  |    
| 3    -50    -150  |   
| 4    -40    -140  |
| 5    -30    -130  |    
| 6    -30    -120  |  lon 6000 6100 
| 7    -10    -110  |
| 8     0       .   |
| 9     10      .   |
|10     20      .   |  lat 10400 10500
|11     30      .   |  
|12     40      .   |
|13     50     150  |
|14     60     160  |
|15     70     170  |
|16     80     180  |
 _ _ _ _ _ _ _ _ _ 



lat = 1:16000
lon = 1:36000

1º aprx: 
    lat [] = 100 posiciones  
    lon [] = 100 posiciones


lat[0] - 1 posición = .10
lon[0] - 1 posición = .10



Realizar pruebla con lat[24:25] lon[-113:-112


## El 11 representa la posición en la tabla ##
lat = 100 * 24 * .10 
lat 264*1000 = 26400 



Ejemplos: 

    
lat   23   26
lon -111 -108    

lat   19   29
lon  -97  -87


"""

import numpy as np
import pandas as pd
import xarray as xr
import netCDF4
import cartopy.crs as ccrs
import matplotlib.pyplot as plt

from datetime import timedelta
from datetime import date


##Declaración de variables de cadena ##
# estructura del enlace netcdf 
#https://opendap.jpl.nasa.gov:443/opendap/allData/ghrsst/data/L4/GLOB/JPL_OUROCEAN/G1SST/2010/160/20100609-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2

ban  = False  #Valida que latitudes o latitudes no excedan más de 10º
otra = False #Permite la peiticón de nueva imagen, al seleccionar no como respuesta de nueva consulta. la bandera cambia a False

link1 = "https://opendap.jpl.nasa.gov:443/opendap/allData/ghrsst/data/L4/GLOB/JPL_OUROCEAN/G1SST/"
link2 = "-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2"

anio = 2010
mes  = 1
dia  = 1


anioS = 2010
mesS  = 6
diaS  = 9


latM1 = 0
latM2 = 0 
lonM1 = 0
lonM2 = 0

iCoordLat = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]
coordLat  = [-80,-70,-60,-50,-40, -30, -20, -10, 0 , 10, 20 ,30, 40, 50, 60, 70, 80]

iCoordLon = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36]
coordLon  = [-180,-170,-160,-150,-140, -130, -120, -110, -100, -90, -80, -70, -60, -50, -40, -30, -20, -10, 0 , 10, 20 ,30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150, 160, 170, 180]


##Revisar la conversión de fecha a entero
##Existe un problema en la numeracíon del día a solicitar, ya que da un valor de uno menos, eso debido a que la operaciòn que se realiza es una resta de la fecha solicitada  al primer
#día del año

res = input("¿Datos por default?")
if res=="1":
    fecha1 = "18-08-2018"
    lat1=23
    lat2=26
    lon1=-111
    lon2=-108    

    

while otra!=True:
    while ban!=True:    
        #Solicita al usuario la región a localizar, se debe validar que no sean regiones mayore a 10ºx10º
        
        if res!="1":
            print("Formato de captura (DD-MM-YYYY)")
            fecha1 = input("Capture fecha deseada:  ")
        
        fecha1 = fecha1.split("-")    
        
        anioS= int(fecha1[2])
        mesS = int(fecha1[1])
        diaS = int(fecha1[0])
        anio = anioS
        
        #Determina el número de día transcurrido del año calendario
        diff = abs(date(anioS, mesS, diaS) - date(anio, mes, dia))
        print(diff.days)
        
        if res!="1":        
            lat1 = input("Capture Latitud(1): ")
            lat2 = input("Capture Latitud(2): ")
            lon1 = input("Capture Longitud(1): ")
            lon2 = input("Capture Longitud(2): ")
        
        if( (int(lat1)-int(lat2)) > 10) or (int(lat1)-int(lat2) > 10):
            print(ban) 
        else:
            break
    
    
    #Busca la posición de la matrñiz, segmentada de 100 por cada grado
    c=1    
    for c in iCoordLat:
        if int(lat1) >=coordLat[c-1] and int(lat1) < coordLat[c]:
            latM1 = c-1
            print(latM1)
        if int(lat2) >= coordLat[c-1] and int(lat2) < coordLat[c]:
            latM2 = c-1
            print (latM2)
            
    
    c=1
    for c in iCoordLon:
        if int(lon1) >= coordLon[c-1] and int(lon1) < coordLon[c]:
            lonM1 = c-1
            print(lonM1)
        if int(lon2) >= coordLon[c-1] and int(lon2) < coordLon[c]:
            lonM2 = c-1
            print (lonM2)
    
    
    #Cálculo de índices en la matriz de temperatura
    latMM1 = latM1 * 1000 + (int(lat1)%10)*100
    latMM2 = latM2 * 1000 + (int(lat2)%10)*100
    lonMM1 = lonM1 * 1000 + (int(lon1)%10)*100
    lonMM2 = lonM2 * 1000 + (int(lon2)%10)*100
    
    
    
    #    print (str(c)+"__________")            
    lat = [int(lat1),int(lat2)]
    lon = [int(lon1),int(lon2)]
    
    x = diff.days + 1
    
    
    if len(str(mesS))==1:
        mesS = "0" + str(mesS)
    else:
        mesS = str(mesS)
        
    
    if len(str(diaS))==1:
        diaS = "0" + str(diaS)
    else:
        diaS = str(diaS)
        
    
    
    link = link1 + str(anioS) + "/" + str(x) + "/" + str(anioS) + mesS + diaS + link2
    
    
    ds = xr.open_dataset(link)
    
    sst_c = ds.analysed_sst[0][latMM1:latMM2,lonMM1:lonMM2] - 273.15
    sst_c.plot()
    plt.savefig(str(diaS)+str(mesS)+str(anioS)+"Lat["+str(lat1)+str(lat2)+"]"+"Lon["+str(lon1)+str(lon2)+"].png")
    
    otra = input("Desea realizar otra consulta (s/n): ")
    if (otra=="s"):
        res = ""
        pass
    if (otra=='n'):
        otra = True
        
        
        
        

"""def f(t):
    return np.exp(-t) * np.cos(2*np.pi*t)

t1 = np.arange(0.0, 5.0, 0.1)
t2 = np.arange(0.0, 5.0, 0.02)

plt.figure()
plt.subplot(211)
#plt.plot(t1, f(t1), 'bo', t2, f(t2), 'k')
plt.plot(sst_c)

plt.subplot(212)
plt.plot(t2, np.cos(2*np.pi*t2), 'r--')
plt.show()"""


