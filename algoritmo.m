function algoritmo(algoritmo,usuario,proyecto)

    cd ('c:\\appserv\www\bajamap')
    suma = zeros(500,1000); 
    carpeta = 'proyectos/admin/prueba/'
 %   archivo ='proyectos/admin/Otro proyecto/IMG[20][25][-110][-100]_20150101_admin.mat';

    cd (carpeta)
    lista = dir('*.mat')
    archivos = length(lista)

    cd ('c:\\appserv\www\bajamap')
    if strcmp(algoritmo,'canny')     
        mkdir(strcat(carpeta,'canny'))
        for x = 1:archivos
            datos = load(strcat(carpeta,'/',lista(x).name))
            nombreArchivo = strsplit(lista(x).name,'.')
            nombreArchivo = strsplit(char(nombreArchivo(1)),'IMG');

            I = edge(datos.sst,'canny');
            aux = double(I);
            aux(aux==0) = NaN;
            figure; pcolor(aux), shading flat
            imprime = strcat('c:/appserv/www/bajamap/proyectos/admin/prueba/canny/CAN',char(nombreArchivo(2)))
            print(imprime,'-dtiff')
            save(strcat(carpeta,'canny/','CanBin',char(nombreArchivo(2))))
            suma = suma + aux;
        end
            %suma(suma==0) = NaN;
            figure; pcolor(suma), shading flat
            imprime = strcat('c:/appserv/www/bajamap/proyectos/admin/prueba/canny/CAN',char(nombreArchivo(2)))
            print(strcat(carpeta,'canny/','canny'),'-dtiff')
    elseif strcmp(algoritmo,'cayula')
        mkdir(strcat(carpeta,'cayula'))
        for x = 1:archivos
            load(strcat(carpeta,'/',lista(x).name))
            nombreArchivo = lista(x).name;
            sst(isnan(sst))= 999;       
            out = edgedetect(sst,999,20,8);
            figure;
            pcolor(out);
            shading interp;
            nombreArchivo = strsplit(nombreArchivo,'.')
            print(strcat(carpeta,'cayula/','Cay',char(nombreArchivo(1))),'-dtiff')
            save(strcat(carpeta,'cayula/','CayBin',char(nombreArchivo(1))));
        end
    end
    
end