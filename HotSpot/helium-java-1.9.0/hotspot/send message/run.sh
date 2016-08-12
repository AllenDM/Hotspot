#!/bin/sh
javac -cp ".:../../heliumlib/*" sendMessage.java
java -cp ".:../../heliumlib/*" sendMessage
read -p "Press Enter to continue..." prompt
