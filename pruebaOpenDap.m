%https://data.nodc.noaa.gov/ghrsst/L4/GLOB/JPL_OUROCEAN/G1SST/2015/001/20150101-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2
%https://podaac-opendap.jpl.nasa.gov:443/opendap/allData/ghrsst/data/L4/GLOB/JPL_OUROCEAN/G1SST/2019/001/20190101-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2
%remoteFile = 'https://data.nodc.noaa.gov/ghrsst/L4/GLOB/JPL_OUROCEAN/G1SST/2015/001/20150101-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2'
%remoteFile = 'http://data.nodc.noaa.gov/ghrsst/L4/GLOB/JPL_OUROCEAN/G1SST/2015/001/20150101-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2'
%remoteFile = 'http://data.nodc.noaa.gov/opendap/ghrsst/L4/GLOB/JPL_OUROCEAN/G1SST/2015/001/20150101-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2';
%remoteFile = 'http://podaac-opendap.jpl.nasa.gov:443/opendap/allData/ghrsst/data/L4/GLOB/JPL_OUROCEAN/G1SST/2019/001/20190101-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2';
%ncid = netcdf.open (remoteFile,'WRITE');
%ncid = netcdf.open (remoteFile)

%ncid = netcdf.open('https://podaac-opendap.jpl.nasa.gov:443/opendap/allData/ghrsst/data/L4/GLOB/JPL_OUROCEAN/G1SST/2019/001/20190101-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2');

%[numdims,numvars,numglobalatts,unlimdimid] = netcdf.inq(ncid);

%ncid = netcdf.open('http://data.nodc.noaa.gov/ghrsst/L4/GLOB/JPL_OUROCEAN/G1SST/2015/001/20150101-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2');

%ncread(remoteFile)


%Funcionó el 16-03-19
ncid = netcdf.open('http://opendap.jpl.nasa.gov/opendap/allData/ghrsst/data/L4/GLOB/JPL_OUROCEAN/G1SST/2010/160/20100609-JPL_OUROCEAN-L4UHfnd-GLOB-v01-fv01_0-G1SST.nc.bz2')


