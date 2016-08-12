#!/bin/sh
javac -cp ".:../../heliumlib/*" GoogleSearchExample.java
java -cp ".:../../heliumlib/*" GoogleSearchExample
read -p "Press Enter to continue..." prompt