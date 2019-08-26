%En el formulario los datos deben tener un órden (de momento no está validado), la longitud 1 no debe ser menor que la longitud 2, si fuese el caso marca error en netcdf

function datos(lat1,lat2,lon1,lon2,fechaI, dias, dias2, usuario, proyecto)
%https://data.nodc.noaa.gov/ghrsst/L4/GLOB/JPL_OUROCEAN/G1SST/2015/001/20150101-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2

error = 0;
MatrizBinaria = [];

lat = [lat1 lat2];
lon = [lon1 lon2];
lat1 = int2str(lat(1));
lat2 = int2str(lat(2));
lon1 = int2str(lon(1));
lon2 = int2str(lon(2));

fechaI = strsplit(fechaI,'-');  %formato mes/dia/año;

a    = char(fechaI(1));
m    = char(fechaI(2));
d    = char(fechaI(3));
dias = char(dias);


for x = 1:dias2

if length(m) == 1
    m = strcat('0',m);
end


anio   = char(strcat(fechaI(1),'/'));
mes    = char(strcat(fechaI(2),'/'));
dia    = char(strcat(fechaI(3),'/'));
numero = char(strcat(dias,'/'));


%http://opendap.jpl.nasa.gov/opendap/allData/ghrsst/data/L4/GLOB/JPL_OUROCEAN/G1SST/2010/160/20100609-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2'
http = 'http://data.nodc.noaa.gov/opendap/ghrsst/L4/GLOB/JPL_OUROCEAN/G1SST/';
http = 'http://opendap.jpl.nasa.gov/opendap/allData/ghrsst/data/L4/GLOB/JPL_OUROCEAN/G1SST/';
fname = '-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2';


while(error<20)
    try
        ncid = netcdf.open([http anio numero a m d fname])
        error = 777;
    catch
        disp('Error');
        error = error+1; 
    end
end
                                                                                        
R = makerefmat(-180,-80,0.01,0.01);
[LLrow, LLcol] = latlon2pix(R,lat(1),lon(1));
[URrow, URcol] = latlon2pix(R,lat(2),lon(2));
    
kelvin = double(netcdf.getVar(ncid,3,[LLcol LLrow 0], [URcol-LLcol URrow-LLrow 1]));
netcdf.close(ncid);
kelvin(kelvin == -32768) = nan;
kelvin = flipud(rot90(kelvin));
sst = (kelvin * 0.01);


d= str2num(d);
d = d+1;
d = int2str(d);

if length(d) == 1
    d = strcat('0',d);
end
    
 
%Imprime en escala X y Y las coordenadas de SST
llat  = lat(1)+.01;
vlat=llat:0.01:lat(2);
llon = lon(1)+.01;
vlon = llon:0.01:lon(2)
[LON,LAT] = meshgrid(vlon,vlat);

    
archivo  = strcat('proyectos/',usuario,'/',proyecto,'/IMG[',lat1,'][',lat2,'][',lon1,'][',lon2,']_',a,m,d,'_',usuario);
figure;pcolor(LON,LAT,sst),shading flat,colorbar
    
    	
print(archivo,'-dtiff');
save(archivo,'sst');


dias= str2num(dias);
dias = dias+1;
dias = int2str(dias);
if length(dias) == 1
    dias = strcat('00',dias);
elseif length(dias) == 2
    dias = strcat('0',dias);
end

error=0;
end