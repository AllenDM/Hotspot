#!/bin/sh
javac -cp ".:../../heliumlib/*" createAccount.java
java -cp ".:../../heliumlib/*" createAccount
read -p "Press Enter to continue..." prompt
