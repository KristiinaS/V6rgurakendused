--loon andmebaasi
create database praks11; 

--�l2 - loon tabeli
create table 10153280_pildid (id integer primary key auto_increment, thumb varchar(64), pilt varchar(64), pealkiri varchar(64), autor varchar(64), punktid integer);

--�l3 - lisan tabelisse andmeid
insert into test (thumb, pilt, pealkiri, autor, punktid) values \
('thumb 1', 'pilt 1', 'Kass', 'Mari', 38),\
('thumb 2', 'pilt 2', 'Koer', 'Mati', 31),\
('thumb 3', 'pilt 3', 'Rott', 'Jaak', 39),\
('thumb 4', 'pilt 4', 'Hobune', 'Maarja', 21),\
('thumb 5', 'pilt 5', 'Siga', 'Mati', 25);

--�l4 - sorteeri kahanevas j�rjekorras alla 30 punkti saajad
select * from 10153280_pildid where punktid<30 order by punktid desc;

--�l5 - n�ita Mati pilte
select * from 10153280_pildid where autor="Mati";

--�l6 - lisa k�ikidele 3 punkti
update 10153280_pildid set punktid=punktid+3;

--�l7 - leia �les, mitu pilti igal autoril on
select autor,count(*) from 10153280_pildid group by autor;

--�l8 - palju punkte kokku
select sum(punktid) from 10153280_pildid;