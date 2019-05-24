#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Thu May 16 13:22:07 2019

@author: administrador
"""
import matplotlib.pyplot as plt
#from netCDF4 import Dataset
import netCDF4
from latlon2pix import latlon2pix


#dataset = Dataset('https://data.nodc.noaa.gov/thredds/dodsC/ghrsst/L4/SAMERICA/UFRJ/REMO_OI_SST_5km/2016/285/20161011120000-UFRJ-L4_GHRSST-SSTfnd-REMO_OI_SST_5km-SAMERICA-v02.0-fv01.0.nc')
dataset = netCDF4.Dataset('https://opendap.jpl.nasa.gov:443/opendap/allData/ghrsst/data/L4/GLOB/JPL_OUROCEAN/G1SST/2010/160/20100609-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2')

print (dataset.file_format)
print (dataset.dimensions.keys())
print (dataset.dimensions['time'])
print (dataset.variables.keys())
print (dataset.variables['lat'])
print (dataset.variables['lon'])
print(dataset.variables['analysed_sst'])



sst = dataset.variables['analysed_sst'][0,5000:8000,5000:6000]
#print(sst)
#print(sst[0,1:10,1:100])
plt.pcolor(sst)




t  = dataset.variables['time'][0]
lo = dataset.variables['lon'][1:10]
la = dataset.variables['lat'][1:10]

sst2 = sst[0,1:400,1:300]
sst2 = dataset.variables['analysed_sst'][0]


print(dataset.variables['analysed_sst'])
plt.pcolor(sst2)
plt.colorbar()
print(dataset.variables['analysed_sst'][0,:,:])



import matplotlib.pyplot as plt
import numpy as np
import netCDF4

url = ('http://thredds-test.unidata.ucar.edu/thredds/dodsC/'
       'satellite/goes16/GRB16/ABI/CONUS/Channel02/current/'
       'OR_ABI-L1b-RadC-M3C02_G16_s20182341637323_e20182341640096_c20182341640138.nc')

ds = netCDF4.Dataset(url)

values = ds.variables['Rad'][:,:]
print(np.count_nonzero(values==-20.289911))

plt.imshow(values)
plt.show()


latlon2pix




"""" Secuencia de matlaba que debe ser traducida a Python


 R = makerefmat(-180,-80,0.01,0.01);
     [LLrow, LLcol] = latlon2pix(R,lat(1),lon(1));
     [URrow, URcol] = latlon2pix(R,lat(2),lon(2));
    
     kelvin = double(netcdf.getVar(ncid,3,[LLcol LLrow 0], [URcol-LLcol URrow-LLrow 1]));
     %kelvin = double(netcdf.getVar(ncid,1));
     netcdf.close(ncid);
     kelvin(kelvin == -32768) = nan;
     kelvin = flipud(rot90(kelvin));
     sst = (kelvin * 0.01);
"""




import cartopy.feature as cfeature
import matplotlib.pyplot as plt
import xarray as xr

# Any import of metpy will activate the accessors
from metpy.testing import get_test_data

ds = xr.open_dataset(get_test_data('narr_example.nc', as_file_obj=False))
data_var = ds.metpy.parse_cf('Temperature')

x = data_var.x
y = data_var.y
im_data = data_var.isel(time=0).sel(isobaric=1000.)

fig = plt.figure(figsize=(14, 14))
ax = fig.add_subplot(1, 1, 1, projection=data_var.metpy.cartopy_crs)

ax.imshow(im_data, extent=(x.min(), x.max(), y.min(), y.max()),
          cmap='RdBu', origin='lower' if y[0] < y[-1] else 'upper')
ax.coastlines(color='tab:green', resolution='10m')
ax.add_feature(cfeature.LAKES.with_scale('10m'), facecolor='none', edgecolor='tab:blue')
ax.add_feature(cfeature.RIVERS.with_scale('10m'), edgecolor='tab:blue')

plt.show()