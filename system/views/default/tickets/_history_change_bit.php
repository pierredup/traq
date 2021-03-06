<?php
if (!function_exists('_mklocale')) {
	function _mklocale($change, $locale_property = 'x')
	{
		if (!empty($change['to']) and !empty($change['from'])) {
			$string = "{$locale_property}_from_x_to_x";
		} elseif (!empty($change['to']) and empty($change['from'])) {
			$string = "{$locale_property}_from_null_to_x";
		} elseif (empty($change['to']) and !empty($change['from'])) {
			$string = "{$locale_property}_from_x_to_null";
		}
		return l(
			"ticket_history.{$string}",
			'<span class="ticket_history_property">' . l($change['property']) . '</span>',
			'<span class="ticket_history_from">' . $change['from'] . '</span>',
			'<span class="ticket_history_to">' . $change['to'] . '</span>'
		);
	}
}

// Was an action performed?
if (isset($change['action'])) {
	echo l("ticket_history.{$change['action']}", $change['from'], $change['to']);
}
// Is this the assigned_to property?
elseif ($change['property'] == 'assigned_to') {
	foreach (array('to', 'from') as $key) {
		// Is the to/from values a user id?
		if (is_numeric($change[$key])) {
			// Set it to the users name
			$change[$key] = User::find($change[$key])->name;
		}
	}
	echo _mklocale($change, 'assignee');
}
// For everything else
else {
	echo _mklocale($change);
}