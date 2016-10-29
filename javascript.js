$('a[rel=popover]').popover({
  html: true,
  trigger: 'hover',
  placement: 'left',
  content: function(){return '<img src="'+$(this).data('img') + '" />';}
});