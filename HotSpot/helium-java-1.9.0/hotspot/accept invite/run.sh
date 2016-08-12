#!/bin/sh
javac -cp ".:../../heliumlib/*" AcceptInvite.java
java -cp ".:../../heliumlib/*" AcceptInvite
read -p "Press Enter to continue..." prompt


