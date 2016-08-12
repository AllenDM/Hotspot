#!/bin/sh
javac -cp ".:../../heliumlib/*" TwitterExample.java
java -cp ".:../../heliumlib/*" TwitterExample
read -p "Press Enter to continue..." prompt