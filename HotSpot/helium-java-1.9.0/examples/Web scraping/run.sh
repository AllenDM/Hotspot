#!/bin/sh
javac -cp ".:../../heliumlib/*" WebScrapingExample.java
java -cp ".:../../heliumlib/*" WebScrapingExample
read -p "Press Enter to continue..." prompt