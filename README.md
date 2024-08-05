# Výherci Oskarů

#### Jednoduchá PHP aplikace zobrazující přehled Oscarů za nejlepší mužskou a ženskou hlavní roli z nahraných .csv souborů.

##### ÚLOHA:

- Vytvořit webovou aplikaci v PHP bez použití frameworku;
- Objektově orientované programování;
- Stylování pomocí Bootstrap 5.
- Spustitelné pomocí Dockeru.

##### VÝSTUP:

- Stránka s formulářem pro nahrání .csv souborů;
- Stránka s výslednými tabulkami.

#### NÁVOD NA SPUŠTĚNÍ

1. Naklonovat repozitář.
```
git clone https://github.com/oleksandralaskaj/fio-banka-php-vr.git
```

2. Přepnout se do naklonované složky.
```
cd fio-banka-php-vr
```

3. Vytvořit a spustit Docker container.
```
docker build . -t oscars
docker run -p3000:80 oscars
```

4. Otevřít aplikaci.
```
http://localhost:3000/