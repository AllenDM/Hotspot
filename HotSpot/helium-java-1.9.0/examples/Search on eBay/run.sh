#!/bin/sh
javac -cp ".:../../heliumlib/*" EbayExample.java
java -cp ".:../../heliumlib/*" EbayExample
read -p "Press Enter to continue..." prompt