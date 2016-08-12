#!/bin/sh
javac -cp ".:../../heliumlib/*" FacebookExample.java
java -cp ".:../../heliumlib/*" FacebookExample
read -p "Press Enter to continue..." prompt