#!/usr/bin/bash

if [ -n "$1" ]; then
	VERSION="$1"

else
	# https://stackoverflow.com/questions/55730793/how-can-i-increment-a-number-at-the-end-of-a-string-in-bash
	[[ $(cat version) =~ ([0-9]+)\.([0-9]+) ]] || { echo 'invalid input'; exit; }

    VERSION="${BASH_REMATCH[1]}.$(( ${BASH_REMATCH[2]} + 1 ))"
fi

echo "New version is $VERSION" &&
echo $VERSION > version &&


FILES="database public changelog.md notes.md pkg.sh version"
zip -r "release/v$VERSION.zip" $FILES



