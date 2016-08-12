#!/bin/sh
javac -cp ".:../../heliumlib/*" createGroup.java
java -cp ".:../../heliumlib/*" createGroup
read -p "Press Enter to continue..." prompt

