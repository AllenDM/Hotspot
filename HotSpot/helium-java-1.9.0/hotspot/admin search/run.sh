#!/bin/sh
javac -cp ".:../../heliumlib/*" adminSearch.java
java -cp ".:../../heliumlib/*" adminSearch
read -p "Press Enter to continue..." prompt



