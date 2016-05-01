--ül2 - loon tabeli
create table loomaaed (\
id integer auto_increment primary key, \
nimi varchar(64), \
vanus integer, \
liik varchar(64), \
puur integer);

--ül3 - täidan tabeli
insert into loomaaed (nimi, vanus, liik, puur) values \
('Vandu', 10, 'elevant', 1),\
('Mömmi', 5, 'karu', 2),\
('Bämbi', 3, 'gasell', 3),\
('Londu', 12, 'elevant', 1),\
('Ment', 9, 'metskits', 3),\
('Lolo', 15, 'pingviin', 4);

--ül4:
--ühes puuris elavate loomade nimed ja puuri number
select nimi,puur from loomaaed where puur=1;
select nimi,puur from loomaaed where puur=3;

--vanima ja noorima looma vanused
select min(vanus),max(vanus) from loomaaed;

--puuri number ja selle elanike arv
select count(puur),puur from loomaaed group by puur asc;

--suurendan vanuseid 1-aasta võrra
update loomaaed set vanus=vanus+1;