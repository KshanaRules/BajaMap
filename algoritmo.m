function algoritmo(algoritmo,usuario,proyecto)

    cd ('c:\\appserv\www\bajamap')
    
    suma = zeros(500,1000); 
    carpeta = 'proyectos/cmorenoc/Boca del GC/'
 %   archivo ='proyectos/admin/Otro proyecto/IMG[20][25][-110][-100]_20150101_admin.mat';

    cd (carpeta)
    lista = dir('*.mat')
    archivos = length(lista)

    
    for x = 1:archivos
        datos = load(lista(x).name);    
        nombreArchivo = strsplit(lista(x).name,'.')
        nombreArchivo = strsplit(char(nombreArchivo(1)),'IMG');

        I = edge(datos.sst,'canny');
        aux = double(I);
        aux(aux==0) = NaN;
        figure; pcolor(aux), shading flat
        imprime = strcat('c:/appserv/www/bajamap/proyectos/cmorenoc/Boca del GC/CAN',char(nombreArchivo(2)))
        print(imprime,'-dtiff')
        suma = suma + I;
    end
        suma(suma==0) = NaN;
        figure; pcolor(suma), shading flat
        imprime = strcat('c:/appserv/www/bajamap/proyectos/cmorenoc/Boca del GC/CAN',char(nombreArchivo(2)))
        print('binario','-dtiff')

    
end