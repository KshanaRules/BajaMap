function out = edgedetect(sst, missval, maxlag, filtsize)

% PURPOSE
% Wraps the C++ version of Cayula and Cornillon's edge detection
% algorithm, modified with a variable moving window by Diehl et al.,
% and updated with a statistical test of the gradient by F. Royer.
% A full Matlab version is available, but much slower.

% INPUT
% -A sst matrix of size ydim*xdim, with land/cloud mask set to missval 
% i.e. an integer value such as 999.
% -Geophysical variable must have positive values.
% -maxlag is the maximum lag used for retrieving the optimal x/y window size
% -filtsize is the median fileter size (keep it low, e.g. 2 to 3)

% OUTPUT
% A binary matrix of size ydim*xdim with edges set to 255.

% USE
% out= edgedetect(sst,0,40,5);

% REQUIRES
% - An executable file named edge_detect.exe 
% - If not available, please compile the source c++ code using BCC 5.5: 
% bcc32 edge_detect.c edge.c pix.c

% AUTHOR
% F. Royer, based on C++ code originally written by Diehl. et al.

% REFERENCES
% Cayula, J.F. and P. Cornillon (1992). "Edge detection algorithm for SST
%   images". J. Atmos. Oceanic Technol. 9:67-80
% Diehl, Scott F., Judith W. Budd, David Ullman and Jean-Francois Cayula 
%   (2002) Geographic Window Sizes Applied to Remote Sensing Sea Surface 
%   Temperature Front Detection. Journal of Atmospheric and Oceanic 
%   Technology, 19(7): 1115-1113.

% Initialisation - format and save sst to a 0-255 matrix
[ydim, xdim]=size(sst);
sstf=sst;
histo=sst(sst~=missval);
m=max(histo);
n=min(histo);

sstf=uint8(253*(sstf-n)/m); % save the 1 value for clouds/land
sstf(sst==missval)=1;
saveascii(double(sstf), 'temp.txt',0);
save('pqfile.txt','ydim','xdim','-ascii')

% Calling edge_detect...
dos(['c:\AppServ\www\BajaMap\edge_detect.exe temp.txt ',int2str(xdim),' ',int2str(ydim),' ',int2str(maxlag),' ',int2str(filtsize)])
if exist('out.txt', 'file')
    load out.txt
    out=out/255;
    delete out.txt
else
    out=zeros(ydim, xdim);
end


