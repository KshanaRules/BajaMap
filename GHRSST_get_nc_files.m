% Obtiene subimágenes SST de 1 km (G1SST)
% Guillermo Martínez F
% CICIMAR-IPN
% Ene/2010
%--------------------------------------------------------------------------

clc

% Subimagen requerida
%--------------------------------------------------------------------------
lat = [  20.01   32.00];
lon = [-117.00 -105.02];

% Lìnea de costa
%--------------------------------------------------------------------------
coast = shaperead(['SHAPE\' 'ne_50m_land.shp'],'UseGeocoords',true);

% Origen de los datos
%--------------------------------------------------------------------------
http  = 'http://ourocean.jpl.nasa.gov:8080/thredds/dodsC/g1sst/';
fname = 'sst_20150101.nc';

% Obtiene la resolución del archivo y sus coordenadas origen
%--------------------------------------------------------------------------
NClat = ncread([http fname],'lat');
NClon = ncread([http fname],'lon');
ALat = NClat(2) - NClat(1);
ALon = NClon(2) - NClon(1);

% Calcula las coordenadas en pixeles
%--------------------------------------------------------------------------
Lat1 = fix((lat(1) - NClat(1)) / ALat);
Lat2 = fix((lat(2) - NClat(1)) / ALat);
Lon1 = fix((lon(1) - NClon(1)) / ALon);
Lon2 = fix((lon(2) - NClon(1)) / ALon);

disp('Tamaño de la imagen a generar:')
coords = ['[' num2str(Lat1) ':' num2str(Lat2) '][' num2str(Lon1) ':' num2str(Lon2) ']'];
pixlat = Lat2-Lat1+1;
pixlon = Lon2-Lon1+1;
disp([coords '---> (' num2str(pixlat) ',' num2str(pixlon) ')'])
disp('Favor de esperar...')

% Abre archivo del catalogo
%catalog = textread('catalog_g1sst_ofronts.txt','%s');

fDates=[];
startDate = datenum(datevec('01.01.15','dd.mm.yy'));
endDate = datenum(datevec('31.01.15','dd.mm.yy'));
fDates=[fDates; datevec(startDate:endDate)];

% d1 = datevec('22.09.13','dd.mm.yy');
% d2 = datevec('25.09.13','dd.mm.yy');
% d3 = datevec('21.12.13','dd.mm.yy');
% fDates=[d1; d2; d3];

% for yr=14:14
%     for mo=12:12
%         for da=1:31
%             startDate = datenum(datevec([num2str(da,'%02i) '.' num2str(mo,'%02i') '.' num2str(yr)],'dd.mm.yy'));
%             endDate = datenum(datevec(['25.03.' num2str(yr)],'dd.mm.yy'));
%             fDates=[fDates; datevec(startDate:endDate)];
%         end
%     end
% end

% Accede a OPENDAP
%--------------------------------------------------------------------------
t1 = clock;
first = 0;
for i=1:size(fDates,1)
    fname = ['sst_' num2str(fDates(i,1)) num2str(fDates(i,2),'%02i') num2str(fDates(i,3),'%02i') '.nc'];
    err='NoError';
    try
         %roiSST = ncread([http fname],'SST', [Lon1 Lat1 1], [pixlon pixlat 1]);
         ncid = netcdf.open ([http fname]);
         nvar = netcdf.inqVarID(ncid,'SST');
         roiSST = double(netcdf.getVar(ncid, nvar, [Lon1,Lat1,0],[pixlon,pixlat,1]));
         roiSST(roiSST==-32768)=NaN;
         roiSST = fliplr(rot90(roiSST,3)) / 100;
         %roiSST = roiSST / 100;
         first = 1;
    catch err
        disp([fname ' -> ' err.message])
    end
    if strcmp(err,'NoError')
        disp(['Procesando: ' fname])       
        if first == 1
            %roiLat = double(ncread([http fname],'lat', Lat1, pixlat));
            %roiLon = double(ncread([http fname],'lon', Lon1, pixlon));
            nvar = netcdf.inqVarID(ncid,'lat');
            roiLat = double(netcdf.getVar(ncid, nvar,Lat1,pixlat));
            nvar = netcdf.inqVarID(ncid,'lon');
            roiLon = double(netcdf.getVar(ncid, nvar,Lon1,pixlon));
            [LON,LAT] = meshgrid(roiLon,roiLat);
            roiLat = [min(LAT(:)) max(LAT(:))];
            roiLon = [min(LON(:)) max(LON(:))];
            figure
            [N,M] = size(roiSST);
            first = 0;
        end
        netcdf.close(ncid);
        
        % Mapa
        set(gcf,'Position',[10 10 N*0.5 M*0.5],'Color','w')
        worldmap(roiLat, roiLon);
        pcolorm(LAT, LON, roiSST), caxis([14 32])
        colorbar('South','OuterPosition',[0.345 0.02 0.337 0.06])
        hold on
        geoshow(coast,'FaceColor',[.9 .9 .9], 'EdgeColor', 'black');        
        figname = strrep(fname,'_','-');
        title(figname)
        set(gcf, 'Renderer', 'zbuffer');
        print('-dtiff','-r300',['TIF\' strrep(figname,'nc','TIF')]);
        
        % Graba archivo .mat
        save(['MAT\' strrep(figname,'nc','MAT')], 'roiSST', 'roiLat', 'roiLon','LAT', 'LON') 
    end

end
t2 = clock;
disp(['Tiempo del proceso: ' num2str(etime(t2,t1)/60) ' min'])