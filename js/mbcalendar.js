/*(c) Michiel van der Blonk 2009 - license: http://www.opensource.org/licenses/mit-license.php*/

function MBCalendar(m, y)
{
	this.m = m;
	this.y = y;
	this.weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
}

MBCalendar.prototype.$ =  function(s) {return document.getElementById(s)};

// export as array
MBCalendar.prototype.toArray = function() {
	var d;
	var dates = [];
	for (var i=1;i<32;i++)
	{
		d = new Date(this.y,this.m-1, i);
		if (d.getMonth() == this.m-1)
			dates.push(d);
	}
  return dates;
};

// export as html
MBCalendar.prototype.toHTML = function() {
	var i;
	var ret, dayId, dayClass;
	ret = dayId = dayClass = '';
	var dates = this.toArray();
	ret += '<table class="cal">' + '<tr>';
	for (i in [0,1,2,3,4,5,6])
		ret += '<th>' + this.weekDays[parseInt(dates[i].getDay())].substr(0,1) + '</th>';
	ret += '</tr><tr>';
	for (i in dates)
	{
		var d = dates[i];
		if ((parseInt(i) % 7) == 0)
			ret += '</tr>';
		if ((parseInt(i)+1 % 7==0) && i<dates .length)
			ret += '<tr>';
		dayClass = 'y'+d.getFullYear() + ' m' +(d.getMonth()+1) + ' d' + d.getDate();
		dayId = 'day-' + parseInt(d.getTime()/86400000);
		ret += '<td id="' + dayId + '" class="' + dayClass +'">' + dates[i].getDate() + '</td>';
	}
	ret = ret + '</dates></table>';
	return ret;
};

window.onload = function() {
	var $ = function(s) {return document.getElementById(s)};
	var c;
	$('showCal').onclick = function() {
		var y = $('year').value;
		var m = $('month').value;
		c = new MBCalendar(m, y);
		$('out').innerHTML = c.toHTML();
	};
	$('prev').onclick = function() {
		var d = new Date(c.y,c.m-2,1);
		c = new MBCalendar(d.getMonth()+1, d.getFullYear());
		$('out').innerHTML = c.toHTML();
	}
	$('next').onclick = function() {
		var d = new Date(c.y,c.m,1);
		c = new MBCalendar(d.getMonth()+1, d.getFullYear());
		$('out').innerHTML = c.toHTML();
	}
};