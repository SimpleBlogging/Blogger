#!/bin/bash
#export PATH=$PATH: ./desktop/dev/Workflow

arguments=""

while IFS='' read -r line || [[ -n "$line" ]]; do
    inString="$line"
    arguments="$arguments -$inString"

## Check for new flow start
    if [[ $inString = *"==>"* ]]; then
    command="${inString#*> }" # This is the command we must run
    arguments="$command "
    fi

## Exicute the flow
    if [[ $inString = *"<==#"* ]]; then
    exicute="${arguments%*-<==#}"
    sh $exicute
    arguments=""
    fi

done < "$1"
