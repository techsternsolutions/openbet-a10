(function (lib, img, cjs) {

var p; // shortcut to reference prototypes

// library properties:
lib.properties = {
	width: 1000,
	height: 528,
	fps: 24,
	color: "#FFFFFF",
	manifest: [
		
	]
};



// symbols:



(lib.betshop = function() {
	this.initialize(img.betshop);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,312,295);


(lib.busstation = function() {
	this.initialize(img.busstation);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,143,87);


(lib.bus = function() {
	this.initialize(img.bus);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,337,176);


(lib.casino = function() {
	this.initialize(img.casino);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,392,295);


(lib.guy1 = function() {
	this.initialize(img.guy1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,17,60);


(lib.guy2 = function() {
	this.initialize(img.guy2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,19,68);


(lib.guy3 = function() {
	this.initialize(img.guy3);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,18,59);


(lib.house1 = function() {
	this.initialize(img.house1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,195,213);


(lib.house2 = function() {
	this.initialize(img.house2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,169,365);


(lib.house3 = function() {
	this.initialize(img.house3);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,184,386);


(lib.house4 = function() {
	this.initialize(img.house4);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,184,322);


(lib.preview = function() {
	this.initialize(img.preview);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,2642,555);


(lib.landscape = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.casino();
	this.instance.setTransform(3400,97);

	this.instance_1 = new lib.house1();
	this.instance_1.setTransform(3773.4,186.3);

	this.instance_2 = new lib.house2();
	this.instance_2.setTransform(3954.7,22.8);

	this.instance_3 = new lib.casino();
	this.instance_3.setTransform(0,97);

	this.instance_4 = new lib.house1();
	this.instance_4.setTransform(373.4,186.3);

	this.instance_5 = new lib.house2();
	this.instance_5.setTransform(554.7,22.8);

	this.instance_6 = new lib.house3();
	this.instance_6.setTransform(720.3,0);

	this.instance_7 = new lib.betshop();
	this.instance_7.setTransform(901.5,91);

	this.instance_8 = new lib.house4();
	this.instance_8.setTransform(1204.5,64);

	this.instance_9 = new lib.house2();
	this.instance_9.setTransform(1379.7,22.8);

	this.instance_10 = new lib.casino();
	this.instance_10.setTransform(1539,97);

	// Layer 2
	this.instance_11 = new lib.house2();
	this.instance_11.setTransform(1922.7,22.8);

	// Layer 4
	this.instance_12 = new lib.house1();
	this.instance_12.setTransform(2523.4,186.3);

	this.instance_13 = new lib.house1();
	this.instance_13.setTransform(2173.4,186.3);

	this.addChild(this.instance_13,this.instance_12,this.instance_11,this.instance_10,this.instance_9,this.instance_8,this.instance_7,this.instance_6,this.instance_5,this.instance_4,this.instance_3,this.instance_2,this.instance_1,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,4123.7,399.3);


(lib.guy3_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.guy3();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,18,59);


(lib.guy1_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.guy1();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,17,60);


(lib.guy2_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.guy2();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,19,68);


(lib.busstop = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.busstation();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,143,87);


(lib.bus_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.bus();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,337,176);


// stage content:
(lib.animation = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// bus
	this.instance = new lib.bus_1();
	this.instance.setTransform(-194.2,433.3,1,1,0,0,0,168.5,88);

	this.timeline.addTween(cjs.Tween.get(this.instance).to({x:173.8},24).wait(11).to({rotation:-1.7},3).to({rotation:0},3).wait(69).to({rotation:-1.7},3).to({rotation:0},3).wait(69).to({rotation:-1.7},3).to({rotation:0},3).wait(43).to({x:1183.8},17).wait(25));

	// guy1
	this.instance_1 = new lib.guy1_1();
	this.instance_1.setTransform(356,447.9,1,1,0,0,0,8.5,30);
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(24).to({_off:false},0).wait(17).to({x:-364},59).wait(6).to({x:396},0).wait(10).to({x:-204},58).wait(6).to({x:397},0).wait(11).to({x:-1601},84).wait(1));

	// guy2
	this.instance_2 = new lib.guy2_1();
	this.instance_2.setTransform(375,447.1,1,1,0,0,0,9.5,34);
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(28).to({_off:false},0).wait(13).to({x:-345},59).wait(1).to({x:355},0).wait(15).to({x:-245},58).wait(11).to({x:356},0).wait(6).to({x:-1642},84).wait(1));

	// guy3
	this.instance_3 = new lib.guy3_1();
	this.instance_3.setTransform(393.5,444.6,1,1,0,0,0,9,29.5);
	this.instance_3._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_3).wait(32).to({_off:false},0).wait(9).to({x:-326.5},59).wait(10).to({x:378.5},0).wait(6).to({x:-221.5},58).wait(1).to({x:379.5},0).wait(16).to({x:-1618.5},84).wait(1));

	// Layer 16
	this.instance_4 = new lib.busstop();
	this.instance_4.setTransform(1086.2,434.5,1,1,0,0,0,71.5,43.5);
	this.instance_4._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_4).wait(116).to({_off:false},0).to({x:390.2},58).wait(17).to({x:-1613.8},84).wait(1));

	// Layer 15
	this.instance_5 = new lib.busstop();
	this.instance_5.setTransform(1204.2,434.5,1,1,0,0,0,71.5,43.5);
	this.instance_5._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_5).wait(41).to({_off:false},0).to({x:384.2},59).wait(16).to({x:-215.8},58).wait(17).to({x:-2213.8},84).wait(1));

	// Layer 17
	this.instance_6 = new lib.busstop();
	this.instance_6.setTransform(2356.2,434.5,1,1,0,0,0,71.5,43.5);
	this.instance_6._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_6).wait(191).to({_off:false},0).to({x:376.2},84).wait(1));

	// bust-stop
	this.instance_7 = new lib.busstop();
	this.instance_7.setTransform(376.2,434.5,1,1,0,0,0,71.5,43.5);

	this.timeline.addTween(cjs.Tween.get(this.instance_7).wait(41).to({x:-343.8},59).wait(16).to({x:-943.8},58).wait(17).to({x:-2941.8},84).wait(1));

	// casino
	this.instance_8 = new lib.landscape();
	this.instance_8.setTransform(1354.3,249.3,1,1,0,0,0,965.5,199.6);

	this.timeline.addTween(cjs.Tween.get(this.instance_8).wait(41).to({x:554.3},59).wait(16).to({x:-135.7},58).wait(17).to({x:-2043.7},84).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(137.3,313.7,4875.1,471.6);

})(lib = lib||{}, images = images||{}, createjs = createjs||{});
var lib, images, createjs;