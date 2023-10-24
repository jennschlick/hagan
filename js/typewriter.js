var app = document.getElementById('typewriter');

var typewriter = new Typewriter(app, {
	loop: true
});

typewriter.typeString('creativity')
  .pauseFor(2500)
  .deleteAll()
  .typeString('ethics')
  .pauseFor(2500)
  .deleteAll()
  .typeString('humanity')
  .pauseFor(2500)
  .deleteAll()
  .typeString('<span>heart</span>')
  .pauseFor(5500)
  .start()