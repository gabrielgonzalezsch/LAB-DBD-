@echo off

set cwd=%cd%
set homesteadVagrant=C:\Homestead

cd /d %homesteadVagrant% && vagrant up && vagrant ssh
cd /d %cwd%

set cwd=
set homesteadVagrant=