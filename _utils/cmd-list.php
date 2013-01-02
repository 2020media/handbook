<?php

# Given a list of commands as JSON on STDIN, generates an HTML table with the
# top-level commands.
#
# Example usage:
#
# wp --cmd-dump --path=/path/to/wp | php _utils/cmd-list.php

include __DIR__ . '/utils.php';

$wp = read_json();

foreach ( $wp['subcommands'] as $command ) {
	echo <<<EOB
	<tr>
		<td><a href="https://github.com/wp-cli/wp-cli/blob/master/php/commands/{$command['name']}.php">{$command['name']}</a></td>
		<td>{$command['description']}</td>
	</tr>

EOB;
}

