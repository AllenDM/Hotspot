#!/bin/sh
javac -cp ".:../../heliumlib/*" userLogin.java
java -cp ".:../../heliumlib/*" userLogin
read -p "Press Enter to continue..." prompt
