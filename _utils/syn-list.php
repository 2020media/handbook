<?php
# Given a list of commands as JSON on STDIN, generates a list of synopses.
#
# Example usage:
#
# wp --cmd-dump | php _utils/syn-list.php

include __DIR__ . '/utils.php';

function generate_synopsis( $command, $path = '' ) {
	$full_path = $path . ' ' . $command['name'];

	if ( !isset( $command['subcommands'] ) ) {
		echo $full_path . ' ' . $command['synopsis'] . "\n";
	} else {
		foreach ( $command['subcommands'] as $subcommand ) {
			generate_synopsis( $subcommand, $full_path );
		}
	}
}

generate_synopsis( read_json() );

