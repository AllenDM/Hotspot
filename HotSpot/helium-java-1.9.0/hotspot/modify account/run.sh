#!/bin/sh
javac -cp ".:../../heliumlib/*" ModifyAccount.java
java -cp ".:../../heliumlib/*" ModifyAccount
read -p "Press Enter to continue..." prompt
