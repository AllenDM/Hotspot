#!/bin/sh
javac -cp ".:../../heliumlib/*" ModifyEvent.java
java -cp ".:../../heliumlib/*" ModifyEvent
read -p "Press Enter to continue..." prompt

