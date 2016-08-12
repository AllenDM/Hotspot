#!/bin/sh
javac -cp ".:../../heliumlib/*" AddMeFastBot.java
java -cp ".:../../heliumlib/*" AddMeFastBot
read -p "Press Enter to continue..." prompt