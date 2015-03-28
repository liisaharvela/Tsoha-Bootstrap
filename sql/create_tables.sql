CREATE TABLE omistaja(
	id SERIAL PRIMARY KEY, --pääavain
	name varchar(120) NOT NULL --nimi, max 120 merkkiä
);

CREATE TABLE talli(	
	id SERIAL PRIMARY KEY, --pääavain
	name varchar(120) NOT NULL --nimi, max 120 merkkiä
);

CREATE TABLE hevonen(
	id SERIAL PRIMARY KEY, --pääavain
	omistaja_id INTEGER references Omistaja(id), --viittaa Omistaja-tauluun
	talli_id INTEGER references Talli(id), --viittaa Talli-tauluun
	name varchar(120) NOT NULL, --nimi, max 120 merkkiä
	sukupuoli varchar(10) NOT NULL, --sukupuoli, max 10 merkkiä
	rotu varchar(120) NOT NULL, --rotu, max 120 merkkiä
	isa varchar(120) NOT NULL, --isan nimi, max 120 merkkiä
	ema varchar(120) NOT NULL, --eman nimi, max 120 merkkiä
	varitys varchar(120) NOT NULL, --vari, max 120 merkkiä
	syntymaaika DATE, -- syntymaaika, pvm
	ika INTEGER --ika
);

CREATE TABLE kisa(
	id SERIAL PRIMARY KEY, --pääavain
	hevonen_id INTEGER references Hevonen(id), --viittaa Heonn-tauluun
	pvm DATE,
	kisapaikka varchar(120) NOT NULL, --kisapaikan nimi, max 120 merkkiä
	laji varchar(120) NOT NULL, --lajin nimi, max 120 merkkiä
	sijoitus INTEGER
);




	
