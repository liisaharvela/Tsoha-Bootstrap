-- Omistaja-taulun testidata
INSERT INTO omistaja(name) VALUES 
('MINÄ');

-- Talli-taulun testidata
INSERT INTO talli (name) VALUES 
('NIMIII');

-- Hevonen-taulun testidata
INSERT INTO hevonen (name, sukupuoli, rotu, isa, ema, varitys, syntymaaika, ika) VALUES 
('Jeesus', 'ori', 'pyhän kolminaisuudenponi', 'Joosef', 'Maria', 'taivaallinen', '00011224', 20);

-- Kisa-taulun testidata
INSERT INTO kisa (pvm, kisapaikka, laji, sijoitus) VALUES 
('19941102', 'Beetlehem', 'benjihyppy', 1);

-- Kayttaja-taulun testidata
INSERT INTO kayttaja (name, password) VALUES
('virta', 'hepo');