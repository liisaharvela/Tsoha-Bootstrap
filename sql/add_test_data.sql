-- Omistaja-taulun testidata
INSERT INTO omistaja(name) VALUES 
('MINÄ');

-- Talli-taulun testidata
INSERT INTO talli (name) VALUES 
('NIMIII');

-- Hevonen-taulun testidata
INSERT INTO hevonen (name, sukupuoli, rotu, isa, ema, varitys, syntymaaika, ika) VALUES 
('NIMSKU', 'ori', 'juustoponi', 'Jeesus', 'Maria', 'ruskea', '19941102', 8);

-- Kisa-taulun testidata
INSERT INTO kisa (pvm, kisapaikka, laji, sijoitus) VALUES 
('19941102', 'Beetlehem', 'benjihyppy', 1);

-- Kayttaja-taulun testidata
INSERT INTO kayttaja (name, password) VALUES
('virta', 'hepo');