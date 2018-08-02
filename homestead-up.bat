@echo off	
 set cwd=%cd%	
set homesteadVagrant=X:\Homestead	
 cd /d %homesteadVagrant% && vagrant up && vagrant ssh	
cd /d %cwd%	
 set cwd=	
set homesteadVagrant= 