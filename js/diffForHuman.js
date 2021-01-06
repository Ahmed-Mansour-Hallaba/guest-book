
function diffForHumans(unixTime, ms) {
  
  // Adjust for milliseconds
  ms = ms || false;
  unixTime = (ms) ? unixTime * 1000 : unixTime;

  var d = new Date();
  var diff = Math.abs(d.getTime() - unixTime);
  var intervals = {
    y: diff / (365 * 24 * 60 * 60 * 1 * 1000),
    m: diff / (30.5 * 24 * 60 * 60 * 1 * 1000),
    d: diff / (24 * 60 * 60 * 1 * 1000),
    h: diff / (60 * 60 * 1 * 1000),
    i: diff / (60 * 1 * 1000),
    s: diff / (1 * 1000),
  }

  Object.keys(intervals).map(function(value, index) {
    return intervals[value] = Math.floor(intervals[value]);
  })

  var unit;
  var count;

  switch (true) {
    case intervals.y > 0:
      count = intervals.y;
      unit = 'year';
      break;
    case intervals.m > 0:
      count = intervals.m;
      unit = 'month';
      break;
    case intervals.d > 0:
      count = intervals.d;
      unit = 'day';
      break;
    case intervals.h > 0:
      count = intervals.h;
      unit = 'hour';
      break;
    case intervals.i > 0:
      count = intervals.i;
      unit = 'minute';
      break;
    default:
      count = intervals.s;
      unit = 'second';
      break;

  }

  if(count > 1) {
    unit = unit + 's';
  }

  if(count === 0) {
    return 'now';
  }

  return count + ' ' + unit + ((unixTime > d.getTime()) ? ' from now' : ' ago');
}


$('.diff').each(function() {
    var d = new Date($(this).text());
   
    $(this).text(diffForHumans(d));
})