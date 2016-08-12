#!/bin/sh
javac -cp ".:../../heliumlib/*" ExchangeRatesExample.java
java -cp ".:../../heliumlib/*" ExchangeRatesExample
read -p "Press Enter to continue..." prompt