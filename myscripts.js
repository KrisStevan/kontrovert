function perkecilGDB(){
	document.getElementById('gambarDB').width -= 50;
}
function perkecilGDBVar(id){
	var img = document.getElementById(id);
    img.width -= 50;
}

function perbesarGDB(){
	document.getElementById('gambarDB').width += 50;
}
function perbesarGDBVar(id){
	var img = document.getElementById(id);
    img.width += 50;
}

function perendahGDB(){
	document.getElementById('gambarDB').height -= 50;
}
function perendahGDBVar(id){
	var img = document.getElementById(id);
    img.height -= 50;
}

function pertinggiGDB(){
	document.getElementById('gambarDB').height += 50;
}
function pertinggiGDBVar(id){
	var img = document.getElementById(id);
    img.height += 50;
}

function perendahGNDB(){
	document.getElementById('gambarNonDB').height -= 50;
}

function pertinggiGNDB(){
	document.getElementById('gambarNonDB').height += 50;
} 

function perkecilGNDB(){
	document.getElementById('gambarNonDB').width -= 50;
}

function perbesarGNDB(){
	document.getElementById('gambarNonDB').width += 50;
}

function konversi(awalan)
{
	var k = document.BoxForm.nilaiKonversi.value;
	return awalan * k;
}

function konversiCelcius()
{
	document.BoxForm.fahrenheit.value = (document.BoxForm.celcius.value * 9/5) + 32;
	document.BoxForm.reamur.value = document.BoxForm.celcius.value * 4/5;
	document.BoxForm.kelvin.value = document.BoxForm.celcius.value * 1 + 273.15;
	document.BoxForm.rankine.value = (document.BoxForm.celcius.value * 1 + 273.15) * 1.8;
}
		
function konversiFahrenheit()
{
	document.BoxForm.celcius.value = (document.BoxForm.fahrenheit.value - 32) * 5/9;
	document.BoxForm.reamur.value = (document.BoxForm.fahrenheit.value - 32) * 20/45;
	document.BoxForm.kelvin.value = ((document.BoxForm.fahrenheit.value - 32) * 5/9) + 273.15;
	document.BoxForm.rankine.value = (((document.BoxForm.fahrenheit.value - 32) * 5/9) + 273.15) * 1.8;
}
		
function konversiReamur()
{
	document.BoxForm.celcius.value = document.BoxForm.reamur.value * 5/4;
	document.BoxForm.fahrenheit.value = document.BoxForm.reamur.value * 45/20 + 32;
	document.BoxForm.kelvin.value = document.BoxForm.reamur.value * 5/4 + 273.15;
	document.BoxForm.rankine.value = (document.BoxForm.reamur.value * 5/4 + 273.15) * 1.8;
}
		
function konversiKelvin()
{
	document.BoxForm.celcius.value = document.BoxForm.kelvin.value * 1 - 273.15;
	document.BoxForm.fahrenheit.value = 1.8 * (document.BoxForm.kelvin.value - 273.15) + 32;
	document.BoxForm.reamur.value = (document.BoxForm.kelvin.value - 273.15) * 4/5;
	document.BoxForm.rankine.value = document.BoxForm.kelvin.value * 1.8;
}
		
function konversiRankine()
{
	document.BoxForm.celcius.value = (document.BoxForm.rankine.value * 1 - 491.67) * 5/9;
	document.BoxForm.fahrenheit.value = (document.BoxForm.rankine.value * 1 - 459.67);
	document.BoxForm.reamur.value = (document.BoxForm.rankine.value * 1 - 491.67) * 5/9 * 4/5;
	document.BoxForm.kelvin.value = document.BoxForm.rankine.value * 5/9;
}

function konversiTon()
{
	document.BoxForm.kg.value = document.BoxForm.ton.value * 1000;
	document.BoxForm.hg.value = document.BoxForm.ton.value * 10000;
	document.BoxForm.dag.value = document.BoxForm.ton.value * 100000;
	document.BoxForm.g.value = document.BoxForm.ton.value * 1000000;
	document.BoxForm.dg.value = document.BoxForm.ton.value * 10000000;
	document.BoxForm.cg.value = document.BoxForm.ton.value * 100000000;
	document.BoxForm.mg.value = document.BoxForm.ton.value * 1000000000;
	document.BoxForm.ons.value = document.BoxForm.ton.value * 35274;
	document.BoxForm.kw.value = document.BoxForm.ton.value * 10;
	document.BoxForm.pon.value = document.BoxForm.ton.value * 2205;
	document.BoxForm.troyons.value = document.BoxForm.ton.value * 32150;
	document.BoxForm.slug.value = document.BoxForm.ton.value * 68.5;
	document.BoxForm.stone.value = document.BoxForm.ton.value * 157.5;
	document.BoxForm.gr.value = document.BoxForm.ton.value * 15432204;
	document.BoxForm.karat.value = document.BoxForm.ton.value * 5000000;
}

function konversiKG()
{
	document.BoxForm.ton.value = document.BoxForm.kg.value * 0.001;
	document.BoxForm.hg.value = document.BoxForm.kg.value * 10;
	document.BoxForm.dag.value = document.BoxForm.kg.value * 100;
	document.BoxForm.g.value = document.BoxForm.kg.value * 1000;
	document.BoxForm.dg.value = document.BoxForm.kg.value * 10000;
	document.BoxForm.cg.value = document.BoxForm.kg.value * 100000;
	document.BoxForm.mg.value = document.BoxForm.kg.value * 1000000;
	document.BoxForm.ons.value = document.BoxForm.kg.value * 35.274;
	document.BoxForm.kw.value = document.BoxForm.kg.value * 0.01;
	document.BoxForm.pon.value = document.BoxForm.kg.value * 2.205;
	document.BoxForm.troyons.value = document.BoxForm.kg.value * 32.15;
	document.BoxForm.slug.value = document.BoxForm.kg.value * 0.0685;
	document.BoxForm.stone.value = document.BoxForm.kg.value * 0.1575;
	document.BoxForm.gr.value = document.BoxForm.kg.value * 15432.204;
	document.BoxForm.karat.value = document.BoxForm.kg.value * 5000;
}

function konversiHG()
{
	document.BoxForm.ton.value = document.BoxForm.hg.value * 0.0001;
	document.BoxForm.kg.value = document.BoxForm.hg.value * 0.1;
	document.BoxForm.dag.value = document.BoxForm.hg.value * 10;
	document.BoxForm.g.value = document.BoxForm.hg.value * 100;
	document.BoxForm.dg.value = document.BoxForm.hg.value * 1000;
	document.BoxForm.cg.value = document.BoxForm.hg.value * 10000;
	document.BoxForm.mg.value = document.BoxForm.hg.value * 100000;
	document.BoxForm.ons.value = document.BoxForm.hg.value * 3.5274;
	document.BoxForm.kw.value = document.BoxForm.hg.value * 0.001;
	document.BoxForm.pon.value = document.BoxForm.hg.value * 0.2205;
	document.BoxForm.troyons.value = document.BoxForm.hg.value * 3.215;
	document.BoxForm.slug.value = document.BoxForm.hg.value * 0.00685;
	document.BoxForm.stone.value = document.BoxForm.hg.value * 0.01575;
	document.BoxForm.gr.value = document.BoxForm.hg.value * 1543.2204;
	document.BoxForm.karat.value = document.BoxForm.hg.value * 500;
}

function konversiDAG()
{
	document.BoxForm.ton.value = document.BoxForm.dag.value * 0.00001;
	document.BoxForm.kg.value = document.BoxForm.dag.value * 0.01;
	document.BoxForm.hg.value = document.BoxForm.dag.value * 0.1;
	document.BoxForm.g.value = document.BoxForm.dag.value * 10;
	document.BoxForm.dg.value = document.BoxForm.dag.value * 100;
	document.BoxForm.cg.value = document.BoxForm.dag.value * 1000;
	document.BoxForm.mg.value = document.BoxForm.dag.value * 10000;
	document.BoxForm.ons.value = document.BoxForm.dag.value * 0.35274;
	document.BoxForm.kw.value = document.BoxForm.dag.value * 0.0001;
	document.BoxForm.pon.value = document.BoxForm.dag.value * 0.02205;
	document.BoxForm.troyons.value = document.BoxForm.dag.value * 0.3215;
	document.BoxForm.slug.value = document.BoxForm.dag.value * 0.000685;
	document.BoxForm.stone.value = document.BoxForm.dag.value * 0.001575;
	document.BoxForm.gr.value = document.BoxForm.dag.value * 154.32204;
	document.BoxForm.karat.value = document.BoxForm.dag.value * 50;
}

function konversiG()
{
	document.BoxForm.ton.value = document.BoxForm.g.value * 0.000001;
	document.BoxForm.kg.value = document.BoxForm.g.value * 0.001;
	document.BoxForm.hg.value = document.BoxForm.g.value * 0.01;
	document.BoxForm.dag.value = document.BoxForm.g.value * 0.1;
	document.BoxForm.dg.value = document.BoxForm.g.value * 10;
	document.BoxForm.cg.value = document.BoxForm.g.value * 100;
	document.BoxForm.mg.value = document.BoxForm.g.value * 1000;
	document.BoxForm.ons.value = document.BoxForm.g.value * 0.035274;
	document.BoxForm.kw.value = document.BoxForm.g.value * 0.00001;
	document.BoxForm.pon.value = document.BoxForm.g.value * 0.002205;
	document.BoxForm.troyons.value = document.BoxForm.g.value * 0.03215;
	document.BoxForm.slug.value = document.BoxForm.g.value * 0.0000685;
	document.BoxForm.stone.value = document.BoxForm.g.value * 0.0001575;
	document.BoxForm.gr.value = document.BoxForm.g.value * 15.432204;
	document.BoxForm.karat.value = document.BoxForm.g.value * 5;
}

function konversiDG()
{
	document.BoxForm.ton.value = document.BoxForm.dg.value * 0.0000001;
	document.BoxForm.kg.value = document.BoxForm.dg.value * 0.0001;
	document.BoxForm.hg.value = document.BoxForm.dg.value * 0.001;
	document.BoxForm.dag.value = document.BoxForm.dg.value * 0.01;
	document.BoxForm.g.value = document.BoxForm.dg.value * 0.1;
	document.BoxForm.cg.value = document.BoxForm.dg.value * 10;
	document.BoxForm.mg.value = document.BoxForm.dg.value * 100;
	document.BoxForm.ons.value = document.BoxForm.dg.value * 0.0035274;
	document.BoxForm.kw.value = document.BoxForm.dg.value * 0.000001;
	document.BoxForm.pon.value = document.BoxForm.dg.value * 0.0002205;
	document.BoxForm.troyons.value = document.BoxForm.dg.value * 0.003215;
	document.BoxForm.slug.value = document.BoxForm.dg.value * 0.00000685;
	document.BoxForm.stone.value = document.BoxForm.dg.value * 0.00001575;
	document.BoxForm.gr.value = document.BoxForm.dg.value * 1.5432204;
	document.BoxForm.karat.value = document.BoxForm.dg.value * 0.5;
}

function konversiCG()
{
	document.BoxForm.ton.value = document.BoxForm.cg.value * 0.00000001;
	document.BoxForm.kg.value = document.BoxForm.cg.value * 0.00001;
	document.BoxForm.hg.value = document.BoxForm.cg.value * 0.0001;
	document.BoxForm.dag.value = document.BoxForm.cg.value * 0.001;
	document.BoxForm.g.value = document.BoxForm.cg.value * 0.01;
	document.BoxForm.dg.value = document.BoxForm.cg.value * 0.1;
	document.BoxForm.mg.value = document.BoxForm.cg.value * 10;
	document.BoxForm.ons.value = document.BoxForm.cg.value * 0.00035274;
	document.BoxForm.kw.value = document.BoxForm.cg.value * 0.0000001;
	document.BoxForm.pon.value = document.BoxForm.cg.value * 0.00002205;
	document.BoxForm.troyons.value = document.BoxForm.cg.value * 0.0003215;
	document.BoxForm.slug.value = document.BoxForm.cg.value * 0.000000685;
	document.BoxForm.stone.value = document.BoxForm.cg.value * 0.00001575;
	document.BoxForm.gr.value = document.BoxForm.cg.value * 0.15432204;
	document.BoxForm.karat.value = document.BoxForm.cg.value * 0.05;
}

function konversiMG()
{
	document.BoxForm.ton.value = document.BoxForm.mg.value * 0.000000001;
	document.BoxForm.kg.value = document.BoxForm.mg.value * 0.000001;
	document.BoxForm.hg.value = document.BoxForm.mg.value * 0.00001;
	document.BoxForm.dag.value = document.BoxForm.mg.value * 0.0001;
	document.BoxForm.g.value = document.BoxForm.mg.value * 0.001;
	document.BoxForm.dg.value = document.BoxForm.mg.value * 0.01;
	document.BoxForm.cg.value = document.BoxForm.mg.value * 0.1;
	document.BoxForm.ons.value = document.BoxForm.mg.value * 0.000035274;
	document.BoxForm.kw.value = document.BoxForm.mg.value * 0.00000001;
	document.BoxForm.pon.value = document.BoxForm.mg.value * 0.000002205;
	document.BoxForm.troyons.value = document.BoxForm.mg.value * 0.00003215;
	document.BoxForm.slug.value = document.BoxForm.mg.value * 0.0000000685;
	document.BoxForm.stone.value = document.BoxForm.mg.value * 0.000001575;
	document.BoxForm.gr.value = document.BoxForm.mg.value * 0.015432204;
	document.BoxForm.karat.value = document.BoxForm.mg.value * 0.005;
}

function konversiOns()
{
	document.BoxForm.ton.value = document.BoxForm.ons.value * 0.00002835;
	document.BoxForm.kg.value = document.BoxForm.ons.value * 0.02835;
	document.BoxForm.hg.value = document.BoxForm.ons.value * 0.2835;
	document.BoxForm.dag.value = document.BoxForm.ons.value * 2.835;
	document.BoxForm.g.value = document.BoxForm.ons.value * 28.35;
	document.BoxForm.dg.value = document.BoxForm.ons.value * 283.5;
	document.BoxForm.cg.value = document.BoxForm.ons.value * 2835;
	document.BoxForm.mg.value = document.BoxForm.ons.value * 28350;
	document.BoxForm.kw.value = document.BoxForm.ons.value * 0.0002835;
	document.BoxForm.pon.value = document.BoxForm.ons.value * 0.06251175;
	document.BoxForm.troyons.value = document.BoxForm.ons.value * 0.911458;
	document.BoxForm.slug.value = document.BoxForm.ons.value * 0.001943;
	document.BoxForm.stone.value = document.BoxForm.ons.value * 0.004464;
	document.BoxForm.gr.value = document.BoxForm.ons.value * 437.5;
	document.BoxForm.karat.value = document.BoxForm.ons.value * 141.747616;
}

function konversiKw()
{
	document.BoxForm.ton.value = document.BoxForm.kw.value * 0.1;
	document.BoxForm.kg.value = document.BoxForm.kw.value * 0.001;
	document.BoxForm.hg.value = document.BoxForm.kw.value * 0.0001;
	document.BoxForm.dag.value = document.BoxForm.kw.value * 0.00001;
	document.BoxForm.g.value = document.BoxForm.kw.value * 0.000001;
	document.BoxForm.dg.value = document.BoxForm.kw.value * 0.0000001;
	document.BoxForm.cg.value = document.BoxForm.kw.value * 0.00000001;
	document.BoxForm.mg.value = document.BoxForm.kw.value * 0.000000001;
	document.BoxForm.ons.value = document.BoxForm.kw.value * 3527.4;
	document.BoxForm.pon.value = document.BoxForm.kw.value * 220.5;
	document.BoxForm.troyons.value = document.BoxForm.kw.value * 3215;
	document.BoxForm.slug.value = document.BoxForm.kw.value * 6.85;
	document.BoxForm.stone.value = document.BoxForm.kw.value * 15.75;
	document.BoxForm.gr.value = document.BoxForm.kw.value * 1543220.4;
	document.BoxForm.karat.value = document.BoxForm.kw.value * 500000;
}

function konversiPon()
{
	document.BoxForm.ton.value = document.BoxForm.pon.value * 0.000454;
	document.BoxForm.kg.value = document.BoxForm.pon.value * 0.454;
	document.BoxForm.hg.value = document.BoxForm.pon.value * 0.0454;
	document.BoxForm.dag.value = document.BoxForm.pon.value * 0.00454;
	document.BoxForm.g.value = document.BoxForm.pon.value * 0.000454;
	document.BoxForm.dg.value = document.BoxForm.pon.value * 0.0000454;
	document.BoxForm.cg.value = document.BoxForm.pon.value * 0.00000454;
	document.BoxForm.mg.value = document.BoxForm.pon.value * 0.00000454;
	document.BoxForm.kw.value = document.BoxForm.pon.value * 0.00454;
	document.BoxForm.ons.value = document.BoxForm.pon.value * 16;
	document.BoxForm.troyons.value = document.BoxForm.pon.value * 14.58;
	document.BoxForm.slug.value = document.BoxForm.pon.value * 0.031081;
	document.BoxForm.stone.value = document.BoxForm.pon.value * 0.071429;
	document.BoxForm.gr.value = document.BoxForm.pon.value * 7000;
	document.BoxForm.karat.value = document.BoxForm.pon.value * 2267.96185;
}

function konversiTroyOns()
{
	document.BoxForm.ton.value = document.BoxForm.troyons.value * 0.000373;
	document.BoxForm.kg.value = document.BoxForm.troyons.value * 0.373242;
	document.BoxForm.hg.value = document.BoxForm.troyons.value * 3.73242;
	document.BoxForm.dag.value = document.BoxForm.troyons.value * 37.3242;
	document.BoxForm.g.value = document.BoxForm.troyons.value * 373.241722;
	document.BoxForm.dg.value = document.BoxForm.troyons.value * 3732.41722;
	document.BoxForm.cg.value = document.BoxForm.troyons.value * 37324.1722;
	document.BoxForm.mg.value = document.BoxForm.troyons.value * 373241.722;
	document.BoxForm.kw.value = document.BoxForm.troyons.value * 0.00373;
	document.BoxForm.ons.value = document.BoxForm.troyons.value * 1.097143;
	document.BoxForm.pon.value = document.BoxForm.troyons.value * 0.068571;
	document.BoxForm.slug.value = document.BoxForm.troyons.value * 0.002131;
	document.BoxForm.stone.value = document.BoxForm.troyons.value * 0.004898;
	document.BoxForm.gr.value = document.BoxForm.troyons.value * 480;
	document.BoxForm.karat.value = document.BoxForm.troyons.value * 155.517384;
}

function konversiSlug()
{
	document.BoxForm.ton.value = document.BoxForm.slug.value * 0.014594;
	document.BoxForm.kg.value = document.BoxForm.slug.value * 14.593903;
	document.BoxForm.hg.value = document.BoxForm.slug.value * 145.93903;
	document.BoxForm.dag.value = document.BoxForm.slug.value * 1459.3903;
	document.BoxForm.g.value = document.BoxForm.slug.value * 14593.903;
	document.BoxForm.dg.value = document.BoxForm.slug.value * 145939.03;
	document.BoxForm.cg.value = document.BoxForm.slug.value * 1459390.3;
	document.BoxForm.mg.value = document.BoxForm.slug.value * 14593903;
	document.BoxForm.kw.value = document.BoxForm.slug.value * 0.14593903;
	document.BoxForm.ons.value = document.BoxForm.slug.value * 514.784779;
	document.BoxForm.pon.value = document.BoxForm.slug.value * 32.174049;
	document.BoxForm.troyons.value = document.BoxForm.slug.value * 469.204877;
	document.BoxForm.stone.value = document.BoxForm.slug.value * 2.298146;
	document.BoxForm.gr.value = document.BoxForm.slug.value * 225218.340864;
	document.BoxForm.karat.value = document.BoxForm.slug.value * 72969.515;
}

function konversiStone()
{
	document.BoxForm.ton.value = document.BoxForm.stone.value * 0.00635;
	document.BoxForm.kg.value = document.BoxForm.stone.value * 6.350293;
	document.BoxForm.hg.value = document.BoxForm.stone.value * 63.50293;
	document.BoxForm.dag.value = document.BoxForm.stone.value * 635.0293;
	document.BoxForm.g.value = document.BoxForm.stone.value * 6350.293;
	document.BoxForm.dg.value = document.BoxForm.stone.value * 63502.93;
	document.BoxForm.cg.value = document.BoxForm.stone.value * 635029.3;
	document.BoxForm.mg.value = document.BoxForm.stone.value * 6350293;
	document.BoxForm.kw.value = document.BoxForm.stone.value * 0.06350293;
	document.BoxForm.ons.value = document.BoxForm.stone.value * 224;
	document.BoxForm.pon.value = document.BoxForm.stone.value * 14;
	document.BoxForm.troyons.value = document.BoxForm.stone.value * 204.166667;
	document.BoxForm.slug.value = document.BoxForm.stone.value * 0.435133;
	document.BoxForm.gr.value = document.BoxForm.stone.value * 98000;
	document.BoxForm.karat.value = document.BoxForm.stone.value * 31751.4659;
}

function konversiGr()
{
	document.BoxForm.ton.value = document.BoxForm.gr.value * 0.000000065;
	document.BoxForm.kg.value = document.BoxForm.gr.value * 0.000065;
	document.BoxForm.hg.value = document.BoxForm.gr.value * 0.00065;
	document.BoxForm.dag.value = document.BoxForm.gr.value * 0.0065;
	document.BoxForm.g.value = document.BoxForm.gr.value * 0.065;
	document.BoxForm.dg.value = document.BoxForm.gr.value * 0.65;
	document.BoxForm.cg.value = document.BoxForm.gr.value * 6.5;
	document.BoxForm.mg.value = document.BoxForm.gr.value * 65;
	document.BoxForm.kw.value = document.BoxForm.gr.value * 0.00000065;
	document.BoxForm.ons.value = document.BoxForm.gr.value * 0.002286;
	document.BoxForm.pon.value = document.BoxForm.gr.value * 0.000143;
	document.BoxForm.troyons.value = document.BoxForm.gr.value * 0.002083;
	document.BoxForm.slug.value = document.BoxForm.gr.value * 0.000004;
	document.BoxForm.stone.value = document.BoxForm.gr.value * 0.00001;
	document.BoxForm.karat.value = document.BoxForm.gr.value * 0.323995;
}

function konversiKarat()
{
	document.BoxForm.ton.value = document.BoxForm.karat.value * 0.0000002;
	document.BoxForm.kg.value = document.BoxForm.karat.value * 0.0002;
	document.BoxForm.hg.value = document.BoxForm.karat.value * 0.002;
	document.BoxForm.dag.value = document.BoxForm.karat.value * 0.02;
	document.BoxForm.g.value = document.BoxForm.karat.value * 0.2;
	document.BoxForm.dg.value = document.BoxForm.karat.value * 2;
	document.BoxForm.cg.value = document.BoxForm.karat.value * 20;
	document.BoxForm.mg.value = document.BoxForm.karat.value * 200;
	document.BoxForm.kw.value = document.BoxForm.karat.value * 0.000002;
	document.BoxForm.ons.value = document.BoxForm.karat.value * 0.007055;
	document.BoxForm.pon.value = document.BoxForm.karat.value * 0.000441;
	document.BoxForm.troyons.value = document.BoxForm.karat.value * 0.00643;
	document.BoxForm.slug.value = document.BoxForm.karat.value * 0.000014;
	document.BoxForm.stone.value = document.BoxForm.karat.value * 0.000031;
	document.BoxForm.gr.value = document.BoxForm.karat.value * 3.086472;
}

function konversiMil()
{
	document.BoxForm.km.value = document.BoxForm.mil.value * 1.609;
	document.BoxForm.hm.value = document.BoxForm.mil.value * 16.09;
	document.BoxForm.dam.value = document.BoxForm.mil.value * 160.9;
	document.BoxForm.m.value = document.BoxForm.mil.value * 1609;
	document.BoxForm.dm.value = document.BoxForm.mil.value * 16090;
	document.BoxForm.cm.value = document.BoxForm.mil.value * 160900;
	document.BoxForm.mm.value = document.BoxForm.mil.value * 1609000;
	document.BoxForm.inch.value = document.BoxForm.mil.value * 63360;
	document.BoxForm.ft.value = document.BoxForm.mil.value * 5280;
	document.BoxForm.yard.value = document.BoxForm.mil.value * 36000;
	document.BoxForm.ml.value = document.BoxForm.mil.value * 0.869;
	document.BoxForm.angstrom.value = document.BoxForm.mil.value * 16090000000000;
	document.BoxForm.tc.value = document.BoxForm.mil.value * 0.0000000000001609;
}

function konversiKM()
{
	document.BoxForm.mil.value = document.BoxForm.km.value * 0.621371;
	document.BoxForm.hm.value = document.BoxForm.km.value * 10;
	document.BoxForm.dam.value = document.BoxForm.km.value * 100;
	document.BoxForm.m.value = document.BoxForm.km.value * 1000;
	document.BoxForm.dm.value = document.BoxForm.km.value * 10000;
	document.BoxForm.cm.value = document.BoxForm.km.value * 100000;
	document.BoxForm.mm.value = document.BoxForm.km.value * 1000000;
	document.BoxForm.inch.value = document.BoxForm.km.value * 39370.08;
	document.BoxForm.ft.value = document.BoxForm.km.value * 3280.04;
	document.BoxForm.yard.value = document.BoxForm.km.value * 1093.6;
	document.BoxForm.ml.value = document.BoxForm.km.value * 0.539;
	document.BoxForm.angstrom.value = document.BoxForm.km.value * 10000000000000;
	document.BoxForm.tc.value = document.BoxForm.km.value * 0.0000000000001;
}

function konversiHM()
{
	document.BoxForm.mil.value = document.BoxForm.hm.value * 0.0621371;
	document.BoxForm.km.value = document.BoxForm.hm.value * 0.1;
	document.BoxForm.dam.value = document.BoxForm.hm.value * 10;
	document.BoxForm.m.value = document.BoxForm.hm.value * 100;
	document.BoxForm.dm.value = document.BoxForm.hm.value * 1000;
	document.BoxForm.cm.value = document.BoxForm.hm.value * 10000;
	document.BoxForm.mm.value = document.BoxForm.hm.value * 100000;
	document.BoxForm.inch.value = document.BoxForm.hm.value * 3937.008;
	document.BoxForm.ft.value = document.BoxForm.hm.value * 328.004;
	document.BoxForm.yard.value = document.BoxForm.hm.value * 109.36;
	document.BoxForm.ml.value = document.BoxForm.hm.value * 0.0539;
	document.BoxForm.angstrom.value = document.BoxForm.hm.value * 1000000000000;
	document.BoxForm.tc.value = document.BoxForm.hm.value * 0.00000000000001;
}

function konversiDAM()
{
	document.BoxForm.mil.value = document.BoxForm.dam.value * 0.00621371;
	document.BoxForm.km.value = document.BoxForm.dam.value * 0.01;
	document.BoxForm.hm.value = document.BoxForm.dam.value * 0.1;
	document.BoxForm.m.value = document.BoxForm.dam.value * 10;
	document.BoxForm.dm.value = document.BoxForm.dam.value * 100;
	document.BoxForm.cm.value = document.BoxForm.dam.value * 1000;
	document.BoxForm.mm.value = document.BoxForm.dam.value * 10000;
	document.BoxForm.inch.value = document.BoxForm.dam.value * 393.7008;
	document.BoxForm.ft.value = document.BoxForm.dam.value * 32.8004;
	document.BoxForm.yard.value = document.BoxForm.dam.value * 10.936;
	document.BoxForm.ml.value = document.BoxForm.dam.value * 0.00539;
	document.BoxForm.angstrom.value = document.BoxForm.dam.value * 100000000000;
	document.BoxForm.tc.value = document.BoxForm.dam.value * 0.000000000000001;
}

function konversiM()
{
	document.BoxForm.mil.value = document.BoxForm.m.value * 0.000621371;
	document.BoxForm.km.value = document.BoxForm.m.value * 0.001;
	document.BoxForm.hm.value = document.BoxForm.m.value * 0.01;
	document.BoxForm.dam.value = document.BoxForm.m.value * 0.1;
	document.BoxForm.dm.value = document.BoxForm.m.value * 10;
	document.BoxForm.cm.value = document.BoxForm.m.value * 100;
	document.BoxForm.mm.value = document.BoxForm.m.value * 1000;
	document.BoxForm.inch.value = document.BoxForm.m.value * 39.37008;
	document.BoxForm.ft.value = document.BoxForm.m.value * 3.28004;
	document.BoxForm.yard.value = document.BoxForm.m.value * 1.0936;
	document.BoxForm.ml.value = document.BoxForm.m.value * 0.000539;
	document.BoxForm.angstrom.value = document.BoxForm.m.value * 10000000000;
	document.BoxForm.tc.value = document.BoxForm.m.value * 0.0000000000000001;
}

function konversiDM()
{
	document.BoxForm.mil.value = document.BoxForm.dm.value * 0.0000621371;
	document.BoxForm.km.value = document.BoxForm.dm.value * 0.0001;
	document.BoxForm.hm.value = document.BoxForm.dm.value * 0.001;
	document.BoxForm.dam.value = document.BoxForm.dm.value * 0.01;
	document.BoxForm.m.value = document.BoxForm.dm.value * 0.1;
	document.BoxForm.cm.value = document.BoxForm.dm.value * 10;
	document.BoxForm.mm.value = document.BoxForm.dm.value * 100;
	document.BoxForm.inch.value = document.BoxForm.dm.value * 3.937008;
	document.BoxForm.ft.value = document.BoxForm.dm.value * 0.328004;
	document.BoxForm.yard.value = document.BoxForm.dm.value * 0.10936;
	document.BoxForm.ml.value = document.BoxForm.dm.value * 0.0000539;
	document.BoxForm.angstrom.value = document.BoxForm.dm.value * 1000000000;
	document.BoxForm.tc.value = document.BoxForm.dm.value * 0.00000000000000001;
}

function konversiCM()
{
	document.BoxForm.mil.value = document.BoxForm.cm.value * 0.00000621371;
	document.BoxForm.km.value = document.BoxForm.cm.value * 0.00001;
	document.BoxForm.hm.value = document.BoxForm.cm.value * 0.0001;
	document.BoxForm.dam.value = document.BoxForm.cm.value * 0.001;
	document.BoxForm.m.value = document.BoxForm.cm.value * 0.01;
	document.BoxForm.dm.value = document.BoxForm.cm.value * 0.1;
	document.BoxForm.mm.value = document.BoxForm.cm.value * 10;
	document.BoxForm.inch.value = document.BoxForm.cm.value * 0.3937008;
	document.BoxForm.ft.value = document.BoxForm.cm.value * 0.0328004;
	document.BoxForm.yard.value = document.BoxForm.cm.value * 0.010936;
	document.BoxForm.ml.value = document.BoxForm.cm.value * 0.00000539;
	document.BoxForm.angstrom.value = document.BoxForm.cm.value * 100000000;
	document.BoxForm.tc.value = document.BoxForm.cm.value * 0.000000000000000001;
}

function konversiMM()
{
	document.BoxForm.mil.value = document.BoxForm.mm.value * 0.000000621371;
	document.BoxForm.km.value = document.BoxForm.mm.value * 0.000001;
	document.BoxForm.hm.value = document.BoxForm.mm.value * 0.00001;
	document.BoxForm.dam.value = document.BoxForm.mm.value * 0.0001;
	document.BoxForm.m.value = document.BoxForm.mm.value * 0.001;
	document.BoxForm.dm.value = document.BoxForm.mm.value * 0.01;
	document.BoxForm.cm.value = document.BoxForm.mm.value * 0.1;
	document.BoxForm.inch.value = document.BoxForm.mm.value * 0.03937008;
	document.BoxForm.ft.value = document.BoxForm.mm.value * 0.00328004;
	document.BoxForm.yard.value = document.BoxForm.mm.value * 0.0010936;
	document.BoxForm.ml.value = document.BoxForm.mm.value * 0.000000539;
	document.BoxForm.angstrom.value = document.BoxForm.mm.value * 10000000;
	document.BoxForm.tc.value = document.BoxForm.mm.value * 0.0000000000000000001;
}

function konversiInch()
{
	document.BoxForm.mil.value = document.BoxForm.inch.value * 0.000016;
	document.BoxForm.km.value = document.BoxForm.inch.value * 0.0000254;
	document.BoxForm.hm.value = document.BoxForm.inch.value * 0.000254 ;
	document.BoxForm.dam.value = document.BoxForm.inch.value * 0.00254 ;
	document.BoxForm.m.value = document.BoxForm.inch.value * 0.0254;
	document.BoxForm.dm.value = document.BoxForm.inch.value * 0.254;
	document.BoxForm.cm.value = document.BoxForm.inch.value * 2.54;
	document.BoxForm.mm.value = document.BoxForm.inch.value * 25.4;
	document.BoxForm.ft.value = document.BoxForm.inch.value * 0.083333;
	document.BoxForm.yard.value = document.BoxForm.inch.value * 0.027778;
	document.BoxForm.ml.value = document.BoxForm.inch.value * 0.000014;
	document.BoxForm.angstrom.value = document.BoxForm.inch.value * 254000000;
	document.BoxForm.tc.value = document.BoxForm.inch.value * 0.00000000000000000254;
}

function konversiKaki()
{
	document.BoxForm.mil.value = document.BoxForm.ft.value * 0.000189;
	document.BoxForm.km.value = document.BoxForm.ft.value * 0.000305;
	document.BoxForm.hm.value = document.BoxForm.ft.value * 0.00305;
	document.BoxForm.dam.value = document.BoxForm.ft.value * 0.0305;
	document.BoxForm.m.value = document.BoxForm.ft.value * 0.305;
	document.BoxForm.dm.value = document.BoxForm.ft.value * 3.05;
	document.BoxForm.cm.value = document.BoxForm.ft.value * 30.5;
	document.BoxForm.mm.value = document.BoxForm.ft.value * 305;
	document.BoxForm.inch.value = document.BoxForm.ft.value * 12;
	document.BoxForm.yard.value = document.BoxForm.ft.value * 0.333333;
	document.BoxForm.ml.value = document.BoxForm.ft.value * 0.000165;
	document.BoxForm.angstrom.value = document.BoxForm.ft.value * 3048000000;
	document.BoxForm.tc.value = document.BoxForm.ft.value * 0.0000000000000000305;
}

function konversiYardPanjang()
{
	document.BoxForm.mil.value = document.BoxForm.yard.value * 0.000568;
	document.BoxForm.km.value = document.BoxForm.yard.value * 0.000914;
	document.BoxForm.hm.value = document.BoxForm.yard.value * 0.00914;
	document.BoxForm.dam.value = document.BoxForm.yard.value * 0.0914;
	document.BoxForm.m.value = document.BoxForm.yard.value * 0.914;
	document.BoxForm.dm.value = document.BoxForm.yard.value * 9.14;
	document.BoxForm.cm.value = document.BoxForm.yard.value * 91.4;
	document.BoxForm.mm.value = document.BoxForm.yard.value * 914;
	document.BoxForm.inch.value = document.BoxForm.yard.value * 36;
	document.BoxForm.ft.value = document.BoxForm.yard.value * 3;
	document.BoxForm.ml.value = document.BoxForm.yard.value * 0.000494;
	document.BoxForm.angstrom.value = document.BoxForm.yard.value * 9144000000;
	document.BoxForm.tc.value = document.BoxForm.yard.value * 0.0000000000000000914;
}

function konversiMilLaut()
{
	document.BoxForm.mil.value = document.BoxForm.ml.value * 1.150779;
	document.BoxForm.km.value = document.BoxForm.ml.value * 1.852;
	document.BoxForm.hm.value = document.BoxForm.ml.value * 18.52;
	document.BoxForm.dam.value = document.BoxForm.ml.value * 185.2;
	document.BoxForm.m.value = document.BoxForm.ml.value * 1852;
	document.BoxForm.dm.value = document.BoxForm.ml.value * 18520;
	document.BoxForm.cm.value = document.BoxForm.ml.value * 185200;
	document.BoxForm.mm.value = document.BoxForm.ml.value * 1852000;
	document.BoxForm.inch.value = document.BoxForm.ml.value * 72913.385827;
	document.BoxForm.ft.value = document.BoxForm.ml.value * 6076.115486;
	document.BoxForm.yard.value = document.BoxForm.ml.value * 2025.371829;
	document.BoxForm.angstrom.value = document.BoxForm.ml.value * 18520000000000;
	document.BoxForm.tc.value = document.BoxForm.ml.value * 0.0000000000001852;
}

function konversiAngstrom()
{
	document.BoxForm.mil.value = document.BoxForm.angstrom.value * 0.00000000000016;
	document.BoxForm.km.value = document.BoxForm.angstrom.value * 0.0000000000001;
	document.BoxForm.hm.value = document.BoxForm.angstrom.value * 0.000000000001;
	document.BoxForm.dam.value = document.BoxForm.angstrom.value * 0.00000000001;
	document.BoxForm.m.value = document.BoxForm.angstrom.value * 0.0000000001;
	document.BoxForm.dm.value = document.BoxForm.angstrom.value * 0.000000001;
	document.BoxForm.cm.value = document.BoxForm.angstrom.value * 0.00000001;
	document.BoxForm.mm.value = document.BoxForm.angstrom.value * 0.0000001;
	document.BoxForm.inch.value = document.BoxForm.angstrom.value * 0.000000003937008;
	document.BoxForm.ft.value = document.BoxForm.angstrom.value * 0.000000000328004;
	document.BoxForm.yard.value = document.BoxForm.angstrom.value * 0.00000000010936;
	document.BoxForm.ml.value = document.BoxForm.angstrom.value * 0.0000000000000539;
	document.BoxForm.tc.value = document.BoxForm.angstrom.value * 0.00000000000000000000000001;
}

function konversiTC()
{
	document.BoxForm.mil.value = document.BoxForm.tc.value * 5878499814210.01;
	document.BoxForm.km.value = document.BoxForm.tc.value * 9460528405000;
	document.BoxForm.hm.value = document.BoxForm.tc.value * 94605284050000;
	document.BoxForm.dam.value = document.BoxForm.tc.value * 946052840500000;
	document.BoxForm.m.value = document.BoxForm.tc.value * 9460528405000000;
	document.BoxForm.dm.value = document.BoxForm.tc.value * 94605284050000000;
	document.BoxForm.cm.value = document.BoxForm.tc.value * 946052840500000000;
	document.BoxForm.mm.value = document.BoxForm.tc.value * 9460528405000000000;
	document.BoxForm.inch.value = document.BoxForm.tc.value * 372461748228346000;
	document.BoxForm.ft.value = document.BoxForm.tc.value * 31038479019028800;
	document.BoxForm.yard.value = document.BoxForm.tc.value * 10346159673009600;
	document.BoxForm.ml.value = document.BoxForm.tc.value * 5108276676565;
	document.BoxForm.angstrom.value = document.BoxForm.tc.value * 9460528404999999000000000;
}
/////////////////////////////untuk bagian geometris//////////////////////////
function konversiKM2()
{
	document.BoxForm.mil2.value = document.BoxForm.km2.value * 0.3861;
	document.BoxForm.m2.value = document.BoxForm.km2.value * 1000000;
	document.BoxForm.perch.value = document.BoxForm.km2.value * 39536.861035;
	document.BoxForm.yard2.value = document.BoxForm.km2.value * 1195990.0463;
	document.BoxForm.rood.value = document.BoxForm.km2.value *  988.42153134;
	document.BoxForm.ha.value = document.BoxForm.km2.value * 100;
	document.BoxForm.acre.value = document.BoxForm.km2.value * 247.1054;
	document.BoxForm.m3.value = document.BoxForm.km2.value * 0;
	document.BoxForm.l.value = document.BoxForm.km2.value * 0;
	document.BoxForm.gal.value = document.BoxForm.km2.value * 0;
	document.BoxForm.ml.value = document.BoxForm.km2.value * 0;
	document.BoxForm.pint.value = document.BoxForm.km2.value * 0;
	document.BoxForm.quart.value = document.BoxForm.km2.value * 0;
	document.BoxForm.floz.value = document.BoxForm.km2.value * 0;
	document.BoxForm.barrel.value = document.BoxForm.km2.value * 0;
	document.BoxForm.dg.value = document.BoxForm.km2.value * 0;
	document.BoxForm.rad.value = document.BoxForm.km2.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiMil2()
{
	document.BoxForm.km2.value = document.BoxForm.mil2.value * 2.5899881103;
	document.BoxForm.m2.value = document.BoxForm.mil2.value * 2589988.1103;
	document.BoxForm.perch.value = document.BoxForm.mil2.value * 102400;
	document.BoxForm.yard2.value = document.BoxForm.mil2.value * 3097600;
	document.BoxForm.rood.value = document.BoxForm.mil2.value * 2560.000141;
	document.BoxForm.ha.value = document.BoxForm.mil2.value * 258.998811;
	document.BoxForm.acre.value = document.BoxForm.mil2.value * 639.999;
	document.BoxForm.m3.value = document.BoxForm.mil2.value * 0;
	document.BoxForm.l.value = document.BoxForm.mil2.value * 0;
	document.BoxForm.gal.value = document.BoxForm.mil2.value * 0;
	document.BoxForm.ml.value = document.BoxForm.mil2.value * 0;
	document.BoxForm.pint.value = document.BoxForm.mil2.value * 0;
	document.BoxForm.quart.value = document.BoxForm.mil2.value * 0;
	document.BoxForm.floz.value = document.BoxForm.mil2.value * 0;
	document.BoxForm.barrel.value = document.BoxForm.mil2.value * 0;
	document.BoxForm.dg.value = document.BoxForm.mil2.value * 0;
	document.BoxForm.rad.value = document.BoxForm.mil2.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiM2()
{
	document.BoxForm.km2.value = document.BoxForm.m2.value * 0.000001;
	document.BoxForm.mil2.value = document.BoxForm.m2.value * 0.00000038610215855;
	document.BoxForm.perch.value = document.BoxForm.m2.value * 0.039536861035;
	document.BoxForm.yard2.value = document.BoxForm.m2.value * 1.1959900463;
	document.BoxForm.rood.value = document.BoxForm.m2.value * 0.00098842153134;
	document.BoxForm.ha.value = document.BoxForm.m2.value * 0.0001;
	document.BoxForm.acre.value = document.BoxForm.m2.value * 0.00024710538147;
	document.BoxForm.m3.value = document.BoxForm.m2.value * 0;
	document.BoxForm.l.value = document.BoxForm.m2.value * 0;
	document.BoxForm.gal.value = document.BoxForm.m2.value * 0;
	document.BoxForm.ml.value = document.BoxForm.m2.value * 0;
	document.BoxForm.pint.value = document.BoxForm.m2.value * 0;
	document.BoxForm.quart.value = document.BoxForm.m2.value * 0;
	document.BoxForm.floz.value = document.BoxForm.m2.value * 0;
	document.BoxForm.barrel.value = document.BoxForm.m2.value * 0;
	document.BoxForm.dg.value = document.BoxForm.m2.value * 0;
	document.BoxForm.rad.value = document.BoxForm.m2.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiPerch()
{
	document.BoxForm.km2.value = document.BoxForm.perch.value * 0.00002529285264;
	document.BoxForm.mil2.value = document.BoxForm.perch.value * 0.0000097656250001;
	document.BoxForm.m2.value = document.BoxForm.perch.value * 25.29285264;
	document.BoxForm.yard2.value = document.BoxForm.perch.value * 30.25;
	document.BoxForm.rood.value = document.BoxForm.perch.value * 0.025000000138 ;
	document.BoxForm.ha.value = document.BoxForm.perch.value * 0.002529285264;
	document.BoxForm.acre.value = document.BoxForm.perch.value * 0.00625;
	document.BoxForm.m3.value = document.BoxForm.perch.value * 0;
	document.BoxForm.l.value = document.BoxForm.perch.value * 0;
	document.BoxForm.gal.value = document.BoxForm.perch.value * 0;
	document.BoxForm.ml.value = document.BoxForm.perch.value * 0;
	document.BoxForm.pint.value = document.BoxForm.perch.value * 0;
	document.BoxForm.quart.value = document.BoxForm.perch.value * 0;
	document.BoxForm.floz.value = document.BoxForm.perch.value * 0;
	document.BoxForm.barrel.value = document.BoxForm.perch.value * 0;
	document.BoxForm.dg.value = document.BoxForm.perch.value * 0;
	document.BoxForm.rad.value = document.BoxForm.perch.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiYard()
{
	document.BoxForm.km2.value = document.BoxForm.yard2.value * 0.00002529285264;
	document.BoxForm.mil2.value = document.BoxForm.yard2.value * 0.0000097656250001;
	document.BoxForm.m2.value = document.BoxForm.yard2.value * 25.29285264;
	document.BoxForm.perch.value = document.BoxForm.yard2.value * 33.081802275;
	document.BoxForm.rood.value = document.BoxForm.yard2.value * 0.025000000138 ;
	document.BoxForm.ha.value = document.BoxForm.yard2.value * 0.002529285264;
	document.BoxForm.acre.value = document.BoxForm.yard2.value * 0.00625;
	document.BoxForm.m3.value = document.BoxForm.yard2.value * 0;
	document.BoxForm.l.value = document.BoxForm.yard2.value * 0;
	document.BoxForm.gal.value = document.BoxForm.yard2.value * 0;
	document.BoxForm.ml.value = document.BoxForm.yard2.value * 0;
	document.BoxForm.pint.value = document.BoxForm.yard2.value * 0;
	document.BoxForm.quart.value = document.BoxForm.yard2.value * 0;
	document.BoxForm.floz.value = document.BoxForm.yard2.value * 0;
	document.BoxForm.barrel.value = document.BoxForm.yard2.value * 0;
	document.BoxForm.dg.value = document.BoxForm.yard2.value * 0;
	document.BoxForm.rad.value = document.BoxForm.yard2.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiRood()
{
	document.BoxForm.km2.value = document.BoxForm.rood.value * 0.0010117141056;
	document.BoxForm.mil2.value = document.BoxForm.rood.value * 0.00039062499784;
	document.BoxForm.m2.value = document.BoxForm.rood.value * 1011.7141056;
	document.BoxForm.perch.value = document.BoxForm.rood.value * 39.9999;
	document.BoxForm.yard2.value = document.BoxForm.rood.value * 1210;
	document.BoxForm.ha.value = document.BoxForm.rood.value * 0.1012;
	document.BoxForm.acre.value = document.BoxForm.rood.value * 0.24999999862;
	document.BoxForm.m3.value = document.BoxForm.rood.value * 0;
	document.BoxForm.l.value = document.BoxForm.rood.value * 0;
	document.BoxForm.gal.value = document.BoxForm.rood.value * 0;
	document.BoxForm.ml.value = document.BoxForm.rood.value * 0;
	document.BoxForm.pint.value = document.BoxForm.rood.value * 0;
	document.BoxForm.quart.value = document.BoxForm.rood.value * 0;
	document.BoxForm.floz.value = document.BoxForm.rood.value * 0;
	document.BoxForm.barrel.value = document.BoxForm.rood.value * 0;
	document.BoxForm.dg.value = document.BoxForm.rood.value * 0;
	document.BoxForm.rad.value = document.BoxForm.rood.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiHa()
{
	document.BoxForm.km2.value = document.BoxForm.ha.value * 0.01;
	document.BoxForm.mil2.value = document.BoxForm.ha.value * 0.0038610215855;
	document.BoxForm.m2.value = document.BoxForm.ha.value * 10000;
	document.BoxForm.perch.value = document.BoxForm.ha.value * 395.368;
	document.BoxForm.yard2.value = document.BoxForm.ha.value * 13079.506;
	document.BoxForm.rood.value = document.BoxForm.ha.value * 9.8842153134;
	document.BoxForm.acre.value = document.BoxForm.ha.value * 2.4710538147;
	document.BoxForm.m3.value = document.BoxForm.ha.value * 0;
	document.BoxForm.l.value = document.BoxForm.ha.value * 0;
	document.BoxForm.gal.value = document.BoxForm.ha.value * 0;
	document.BoxForm.ml.value = document.BoxForm.ha.value * 0;
	document.BoxForm.pint.value = document.BoxForm.ha.value * 0;
	document.BoxForm.quart.value = document.BoxForm.ha.value * 0;
	document.BoxForm.floz.value = document.BoxForm.ha.value * 0;
	document.BoxForm.barrel.value = document.BoxForm.ha.value * 0;
	document.BoxForm.dg.value = document.BoxForm.ha.value * 0;
	document.BoxForm.rad.value = document.BoxForm.ha.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiAcre()
{
	document.BoxForm.km2.value = document.BoxForm.acre.value * 0.0040468564224;
	document.BoxForm.mil2.value = document.BoxForm.acre.value * 0.0015625;
	document.BoxForm.m2.value = document.BoxForm.acre.value * 4046.8564224;
	document.BoxForm.perch.value = document.BoxForm.acre.value * 160;
	document.BoxForm.yard2.value = document.BoxForm.acre.value * 4840;
	document.BoxForm.rood.value = document.BoxForm.acre.value * 4.0000000221;
	document.BoxForm.ha.value = document.BoxForm.acre.value * 0.40468564224;
	document.BoxForm.m3.value = document.BoxForm.acre.value * 0;
	document.BoxForm.l.value = document.BoxForm.acre.value * 0;
	document.BoxForm.gal.value = document.BoxForm.acre.value * 0;
	document.BoxForm.ml.value = document.BoxForm.acre.value * 0;
	document.BoxForm.pint.value = document.BoxForm.acre.value * 0;
	document.BoxForm.quart.value = document.BoxForm.acre.value * 0;
	document.BoxForm.floz.value = document.BoxForm.acre.value * 0;
	document.BoxForm.barrel.value = document.BoxForm.acre.value * 0;
	document.BoxForm.dg.value = document.BoxForm.acre.value * 0;
	document.BoxForm.rad.value = document.BoxForm.acre.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiM3()
{
	document.BoxForm.km2.value = document.BoxForm.m3.value * 0;
	document.BoxForm.mil2.value = document.BoxForm.m3.value * 0;
	document.BoxForm.m2.value = document.BoxForm.m3.value * 0;
	document.BoxForm.perch.value = document.BoxForm.m3.value * 0;
	document.BoxForm.yard2.value = document.BoxForm.m3.value * 0;
	document.BoxForm.rood.value = document.BoxForm.m3.value * 0;
	document.BoxForm.ha.value = document.BoxForm.m3.value * 0;
	document.BoxForm.acre.value = document.BoxForm.m3.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.l.value = document.BoxForm.m3.value * 1000;
	document.BoxForm.gal.value = document.BoxForm.m3.value * 220;
	document.BoxForm.ml.value = document.BoxForm.m3.value * 1000000;
	document.BoxForm.pint.value = document.BoxForm.m3.value * 1760;
	document.BoxForm.quart.value = document.BoxForm.m3.value * 880;
	document.BoxForm.floz.value = document.BoxForm.m3.value * 35195.079728;
	document.BoxForm.barrel.value = document.BoxForm.m3.value * 27.5;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.dg.value = document.BoxForm.m3.value * 0;
	document.BoxForm.rad.value = document.BoxForm.m3.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiL()
{
	document.BoxForm.km2.value = document.BoxForm.l.value * 0;
	document.BoxForm.mil2.value = document.BoxForm.l.value * 0;
	document.BoxForm.m2.value = document.BoxForm.l.value * 0;
	document.BoxForm.perch.value = document.BoxForm.l.value * 0;
	document.BoxForm.yard2.value = document.BoxForm.l.value * 0;
	document.BoxForm.rood.value = document.BoxForm.l.value * 0;
	document.BoxForm.ha.value = document.BoxForm.l.value * 0;
	document.BoxForm.acre.value = document.BoxForm.l.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.m3.value = document.BoxForm.l.value * 0.001;
	document.BoxForm.gal.value = document.BoxForm.l.value * 0.22;
	document.BoxForm.ml.value = document.BoxForm.l.value * 1000;
	document.BoxForm.pint.value = document.BoxForm.l.value * 1.759754;
	document.BoxForm.quart.value = document.BoxForm.l.value * 0.879877;
	document.BoxForm.floz.value = document.BoxForm.l.value * 35.19508;
	document.BoxForm.barrel.value = document.BoxForm.l.value * 0.027496;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.dg.value = document.BoxForm.l.value * 0;
	document.BoxForm.rad.value = document.BoxForm.l.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiGal()
{
	document.BoxForm.km2.value = document.BoxForm.l.value * 0;
	document.BoxForm.mil2.value = document.BoxForm.l.value * 0;
	document.BoxForm.m2.value = document.BoxForm.l.value * 0;
	document.BoxForm.perch.value = document.BoxForm.l.value * 0;
	document.BoxForm.yard2.value = document.BoxForm.l.value * 0;
	document.BoxForm.rood.value = document.BoxForm.l.value * 0;
	document.BoxForm.ha.value = document.BoxForm.l.value * 0;
	document.BoxForm.acre.value = document.BoxForm.l.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.m3.value = document.BoxForm.gal.value * 0.004546;
	document.BoxForm.l.value = document.BoxForm.gal.value * 4.54609;
	document.BoxForm.ml.value = document.BoxForm.gal.value * 4546.09;
	document.BoxForm.pint.value = document.BoxForm.gal.value * 8;
	document.BoxForm.quart.value = document.BoxForm.gal.value * 4;
	document.BoxForm.floz.value = document.BoxForm.gal.value * 160;
	document.BoxForm.barrel.value = document.BoxForm.gal.value * 0.125;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.dg.value = document.BoxForm.gal.value * 0;
	document.BoxForm.rad.value = document.BoxForm.gal.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiML()
{
	document.BoxForm.km2.value = document.BoxForm.ml.value * 0;
	document.BoxForm.mil2.value = document.BoxForm.ml.value * 0;
	document.BoxForm.m2.value = document.BoxForm.ml.value * 0;
	document.BoxForm.perch.value = document.BoxForm.ml.value * 0;
	document.BoxForm.yard2.value = document.BoxForm.ml.value * 0;
	document.BoxForm.rood.value = document.BoxForm.ml.value * 0;
	document.BoxForm.ha.value = document.BoxForm.ml.value * 0;
	document.BoxForm.acre.value = document.BoxForm.ml.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.m3.value = document.BoxForm.ml.value * 0.000001;
	document.BoxForm.l.value = document.BoxForm.ml.value * 0.001;
	document.BoxForm.gal.value = document.BoxForm.ml.value * 0.00022;
	document.BoxForm.pint.value = document.BoxForm.ml.value * 0.00176;
	document.BoxForm.quart.value = document.BoxForm.ml.value * 0.00088;
	document.BoxForm.floz.value = document.BoxForm.ml.value * 0.035195;
	document.BoxForm.barrel.value = document.BoxForm.ml.value * 0.000027;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.dg.value = document.BoxForm.ml.value * 0;
	document.BoxForm.rad.value = document.BoxForm.ml.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiPint()
{
	document.BoxForm.km2.value = document.BoxForm.pint.value * 0;
	document.BoxForm.mil2.value = document.BoxForm.pint.value * 0;
	document.BoxForm.m2.value = document.BoxForm.pint.value * 0;
	document.BoxForm.perch.value = document.BoxForm.pint.value * 0;
	document.BoxForm.yard2.value = document.BoxForm.pint.value * 0;
	document.BoxForm.rood.value = document.BoxForm.pint.value * 0;
	document.BoxForm.ha.value = document.BoxForm.pint.value * 0;
	document.BoxForm.acre.value = document.BoxForm.pint.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.m3.value = document.BoxForm.pint.value * 0.000568;
	document.BoxForm.l.value = document.BoxForm.pint.value * 0.568261;
	document.BoxForm.gal.value = document.BoxForm.pint.value * 0.125;
	document.BoxForm.ml.value = document.BoxForm.pint.value * 568.26125;
	document.BoxForm.quart.value = document.BoxForm.pint.value * 0.5;
	document.BoxForm.floz.value = document.BoxForm.pint.value * 20;
	document.BoxForm.barrel.value = document.BoxForm.pint.value * 0.015625;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.dg.value = document.BoxForm.pint.value * 0;
	document.BoxForm.rad.value = document.BoxForm.pint.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiQuart()
{
	document.BoxForm.km2.value = document.BoxForm.quart.value * 0;
	document.BoxForm.mil2.value = document.BoxForm.quart.value * 0;
	document.BoxForm.m2.value = document.BoxForm.quart.value * 0;
	document.BoxForm.perch.value = document.BoxForm.quart.value * 0;
	document.BoxForm.yard2.value = document.BoxForm.quart.value * 0;
	document.BoxForm.rood.value = document.BoxForm.quart.value * 0;
	document.BoxForm.ha.value = document.BoxForm.quart.value * 0;
	document.BoxForm.acre.value = document.BoxForm.quart.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.m3.value = document.BoxForm.quart.value * 0.001137;
	document.BoxForm.l.value = document.BoxForm.quart.value * 1.136523;
	document.BoxForm.gal.value = document.BoxForm.quart.value * 0.25;
	document.BoxForm.ml.value = document.BoxForm.quart.value * 1136.5225;
	document.BoxForm.pint.value = document.BoxForm.quart.value * 2;
	document.BoxForm.floz.value = document.BoxForm.quart.value * 40;
	document.BoxForm.barrel.value = document.BoxForm.quart.value * 0.03125;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.dg.value = document.BoxForm.quart.value * 0;
	document.BoxForm.rad.value = document.BoxForm.quart.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiFloz()
{
	document.BoxForm.km2.value = document.BoxForm.floz.value * 0;
	document.BoxForm.mil2.value = document.BoxForm.floz.value * 0;
	document.BoxForm.m2.value = document.BoxForm.floz.value * 0;
	document.BoxForm.perch.value = document.BoxForm.floz.value * 0;
	document.BoxForm.yard2.value = document.BoxForm.floz.value * 0;
	document.BoxForm.rood.value = document.BoxForm.floz.value * 0;
	document.BoxForm.ha.value = document.BoxForm.floz.value * 0;
	document.BoxForm.acre.value = document.BoxForm.floz.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.m3.value = document.BoxForm.floz.value * 0.000028;
	document.BoxForm.l.value = document.BoxForm.floz.value * 0.028413;
	document.BoxForm.gal.value = document.BoxForm.floz.value * 0.00625;
	document.BoxForm.ml.value = document.BoxForm.floz.value * 28.413063;
	document.BoxForm.pint.value = document.BoxForm.floz.value * 0.05;
	document.BoxForm.quart.value = document.BoxForm.floz.value * 0.025;
	document.BoxForm.barrel.value = document.BoxForm.floz.value * 0.000781;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.dg.value = document.BoxForm.floz.value * 0;
	document.BoxForm.rad.value = document.BoxForm.floz.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiBarrel()
{
	document.BoxForm.km2.value = document.BoxForm.barrel.value * 0;
	document.BoxForm.mil2.value = document.BoxForm.barrel.value * 0;
	document.BoxForm.m2.value = document.BoxForm.barrel.value * 0;
	document.BoxForm.perch.value = document.BoxForm.barrel.value * 0;
	document.BoxForm.yard2.value = document.BoxForm.barrel.value * 0;
	document.BoxForm.rood.value = document.BoxForm.barrel.value * 0;
	document.BoxForm.ha.value = document.BoxForm.barrel.value * 0;
	document.BoxForm.acre.value = document.BoxForm.barrel.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.m3.value = document.BoxForm.barrel.value * 0.036369;
	document.BoxForm.l.value = document.BoxForm.barrel.value * 36.36872;
	document.BoxForm.gal.value = document.BoxForm.barrel.value * 8;
	document.BoxForm.ml.value = document.BoxForm.barrel.value * 36368.72;
	document.BoxForm.pint.value = document.BoxForm.barrel.value * 64;
	document.BoxForm.quart.value = document.BoxForm.barrel.value * 32;
	document.BoxForm.floz.value = document.BoxForm.barrel.value * 1280;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.dg.value = document.BoxForm.barrel.value * 0;
	document.BoxForm.rad.value = document.BoxForm.barrel.value * 0;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0;
}

function konversiDg()
{
	document.BoxForm.km2.value = document.BoxForm.dg.value * 0;
	document.BoxForm.mil2.value = document.BoxForm.dg.value * 0;
	document.BoxForm.m2.value = document.BoxForm.dg.value * 0;
	document.BoxForm.perch.value = document.BoxForm.dg.value * 0;
	document.BoxForm.yard2.value = document.BoxForm.dg.value * 0;
	document.BoxForm.rood.value = document.BoxForm.dg.value * 0;
	document.BoxForm.ha.value = document.BoxForm.dg.value * 0;
	document.BoxForm.acre.value = document.BoxForm.dg.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.m3.value = document.BoxForm.dg.value * 0;
	document.BoxForm.l.value = document.BoxForm.dg.value * 0;
	document.BoxForm.gal.value = document.BoxForm.dg.value * 0;
	document.BoxForm.ml.value = document.BoxForm.dg.value * 0;
	document.BoxForm.pint.value = document.BoxForm.dg.value * 0;
	document.BoxForm.quart.value = document.BoxForm.dg.value * 0;
	document.BoxForm.floz.value = document.BoxForm.dg.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.rad.value = document.BoxForm.dg.value * 0.017453;
	document.BoxForm.pirad.value = document.BoxForm.dg.value * 0.0055556;
}

function konversiRad()
{
	document.BoxForm.km2.value = document.BoxForm.rad.value * 0;
	document.BoxForm.mil2.value = document.BoxForm.rad.value * 0;
	document.BoxForm.m2.value = document.BoxForm.rad.value * 0;
	document.BoxForm.perch.value = document.BoxForm.rad.value * 0;
	document.BoxForm.yard2.value = document.BoxForm.rad.value * 0;
	document.BoxForm.rood.value = document.BoxForm.rad.value * 0;
	document.BoxForm.ha.value = document.BoxForm.rad.value * 0;
	document.BoxForm.acre.value = document.BoxForm.rad.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.m3.value = document.BoxForm.rad.value * 0;
	document.BoxForm.l.value = document.BoxForm.rad.value * 0;
	document.BoxForm.gal.value = document.BoxForm.rad.value * 0;
	document.BoxForm.ml.value = document.BoxForm.rad.value * 0;
	document.BoxForm.pint.value = document.BoxForm.rad.value * 0;
	document.BoxForm.quart.value = document.BoxForm.rad.value * 0;
	document.BoxForm.floz.value = document.BoxForm.rad.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.dg.value = document.BoxForm.rad.value * 57.29578;
	document.BoxForm.pirad.value = document.BoxForm.rad.value * 18.247064;
}

function konversiPirad()
{
	document.BoxForm.km2.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.mil2.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.m2.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.perch.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.yard2.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.rood.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.ha.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.acre.value = document.BoxForm.pirad.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.m3.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.l.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.gal.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.ml.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.pint.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.quart.value = document.BoxForm.pirad.value * 0;
	document.BoxForm.floz.value = document.BoxForm.pirad.value * 0;
	//////////////////////////////////////////////////////////////////////////
	document.BoxForm.dg.value = document.BoxForm.pirad.value * 180;
	document.BoxForm.rad.value = document.BoxForm.pirad.value * 0.31847134;
}

function konversiDetik()
{
	document.BoxForm.min.value = document.BoxForm.sec.value * 0.0167;
	document.BoxForm.jam.value = document.BoxForm.sec.value * 0.000278;
	document.BoxForm.hari.value = document.BoxForm.sec.value * 0.00011574;
	document.BoxForm.minggu.value = document.BoxForm.sec.value * 0.00011574 / 7;
	document.BoxForm.bl.value = document.BoxForm.sec.value * 0.00011574 / 7 / 4.345238333;
	document.BoxForm.th.value = document.BoxForm.sec.value * 0.0000004328766886;
	document.BoxForm.lust.value = document.BoxForm.sec.value * 0.00000007610349659;
	document.BoxForm.winda.value = document.BoxForm.sec.value * 0.000000009512937;
	document.BoxForm.dasa.value = document.BoxForm.sec.value * 0.00000004328766886;
	document.BoxForm.abad.value = document.BoxForm.sec.value * 0.000000004328766886;
}

function konversiMenit()
{
	document.BoxForm.sec.value = document.BoxForm.min.value * 60;
	document.BoxForm.jam.value = document.BoxForm.min.value * 0.0167;
	document.BoxForm.hari.value = document.BoxForm.min.value * 0.00069583333;
	document.BoxForm.minggu.value = document.BoxForm.min.value * 0.0000994047619;
	document.BoxForm.bl.value = document.BoxForm.min.value * 0.00002287671108;
	document.BoxForm.th.value = document.BoxForm.min.value * 0.00000190639259;
	document.BoxForm.lust.value = document.BoxForm.min.value * 0.0000003812785179;
	document.BoxForm.winda.value = document.BoxForm.min.value * 0.0000002382990738;
	document.BoxForm.dasa.value = document.BoxForm.min.value * 0.000000190639259;
	document.BoxForm.abad.value = document.BoxForm.min.value * 0.0000000190639259;
}

function konversiJam()
{
	document.BoxForm.sec.value = document.BoxForm.jam.value * 3600;
	document.BoxForm.min.value = document.BoxForm.jam.value * 60;
	document.BoxForm.hari.value = document.BoxForm.jam.value * 0.04166667;
	document.BoxForm.minggu.value = document.BoxForm.jam.value * 0.00595238143;
	document.BoxForm.bl.value = document.BoxForm.jam.value * 0.001369863049;
	document.BoxForm.th.value = document.BoxForm.jam.value * 0.0001141552541;
	document.BoxForm.lust.value = document.BoxForm.jam.value * 0.00002283105081;
	document.BoxForm.winda.value = document.BoxForm.jam.value * 0.00001426940676;
	document.BoxForm.dasa.value = document.BoxForm.jam.value * 0.00001141552541;
	document.BoxForm.abad.value = document.BoxForm.jam.value * 0.000001141552541;
}

function konversiHari()
{
	document.BoxForm.sec.value = document.BoxForm.hari.value * 86400;
	document.BoxForm.min.value = document.BoxForm.hari.value * 1440;
	document.BoxForm.jam.value = document.BoxForm.hari.value * 24;
	document.BoxForm.minggu.value = document.BoxForm.hari.value * 0.1428571429;
	document.BoxForm.bl.value = document.BoxForm.hari.value * 0.03287671053;
	document.BoxForm.th.value = document.BoxForm.hari.value * 0.002737850787;
	document.BoxForm.lust.value = document.BoxForm.hari.value * 0.0005475701574;
	document.BoxForm.winda.value = document.BoxForm.hari.value * 0.0003422313484;
	document.BoxForm.dasa.value = document.BoxForm.hari.value * 0.0002737850787;
	document.BoxForm.abad.value = document.BoxForm.hari.value * 0.00002737850787;
}

function konversiMinggu()
{
	document.BoxForm.sec.value = document.BoxForm.minggu.value * 604800;
	document.BoxForm.min.value = document.BoxForm.minggu.value * 10080;
	document.BoxForm.jam.value = document.BoxForm.minggu.value * 168;
	document.BoxForm.hari.value = document.BoxForm.minggu.value * 7;
	document.BoxForm.bl.value = document.BoxForm.minggu.value * 4.34523833;
	document.BoxForm.th.value = document.BoxForm.minggu.value * 52.14286;
	document.BoxForm.lust.value = document.BoxForm.minggu.value * 10.428572;
	document.BoxForm.winda.value = document.BoxForm.minggu.value * 6.5178575;
	document.BoxForm.dasa.value = document.BoxForm.minggu.value * 5.214286;
	document.BoxForm.abad.value = document.BoxForm.minggu.value * 0.5214286;
}

function konversiBulan()
{
	document.BoxForm.sec.value = document.BoxForm.bl.value * 2628000.144;
	document.BoxForm.min.value = document.BoxForm.bl.value * 43800.0024;
	document.BoxForm.jam.value = document.BoxForm.bl.value * 730.00004;
	document.BoxForm.hari.value = document.BoxForm.bl.value * 30.42;
	document.BoxForm.minggu.value = document.BoxForm.bl.value * 4.3452383;
	document.BoxForm.th.value = document.BoxForm.bl.value / 12;
	document.BoxForm.lust.value = document.BoxForm.bl.value / 60;
	document.BoxForm.winda.value = document.BoxForm.bl.value / 96;
	document.BoxForm.dasa.value = document.BoxForm.bl.value / 120 ;
	document.BoxForm.abad.value = document.BoxForm.bl.value / 1200;
}

function konversiTahun()
{
	document.BoxForm.sec.value = document.BoxForm.th.value * 31557600;
	document.BoxForm.min.value = document.BoxForm.th.value * 525960;
	document.BoxForm.jam.value = document.BoxForm.th.value * 8766;
	document.BoxForm.hari.value = document.BoxForm.th.value * 365.25;
	document.BoxForm.minggu.value = document.BoxForm.th.value * 52.14286;
	document.BoxForm.bl.value = document.BoxForm.th.value * 12;
	document.BoxForm.lust.value = document.BoxForm.th.value * 0.2;
	document.BoxForm.winda.value = document.BoxForm.th.value * 0.125;
	document.BoxForm.dasa.value = document.BoxForm.th.value * 0.1;
	document.BoxForm.abad.value = document.BoxForm.th.value * 0.01;
}

function konversiLustrum()
{
	document.BoxForm.sec.value = document.BoxForm.lust.value * 157697280;
	document.BoxForm.min.value = document.BoxForm.lust.value * 2628288;
	document.BoxForm.jam.value = document.BoxForm.lust.value * 43804.8;
	document.BoxForm.hari.value = document.BoxForm.lust.value * 1825.2;
	document.BoxForm.minggu.value = document.BoxForm.lust.value * 260.7142998;
	document.BoxForm.bl.value = document.BoxForm.lust.value * 60;
	document.BoxForm.th.value = document.BoxForm.lust.value * 5;
	document.BoxForm.winda.value = document.BoxForm.lust.value * 0.625;
	document.BoxForm.dasa.value = document.BoxForm.lust.value * 0.5;
	document.BoxForm.abad.value = document.BoxForm.lust.value * 0.05;
}

function konversiWinda()
{
	document.BoxForm.sec.value = document.BoxForm.winda.value * 252315648;
	document.BoxForm.min.value = document.BoxForm.winda.value * 4205260.8;
	document.BoxForm.jam.value = document.BoxForm.winda.value * 70087.68;
	document.BoxForm.hari.value = document.BoxForm.winda.value * 2920.32;
	document.BoxForm.minggu.value = document.BoxForm.winda.value * 417.1428797;
	document.BoxForm.bl.value = document.BoxForm.winda.value * 96;
	document.BoxForm.th.value = document.BoxForm.winda.value * 8;
	document.BoxForm.lust.value = document.BoxForm.winda.value * 1.6;
	document.BoxForm.dasa.value = document.BoxForm.winda.value * 0.8;
	document.BoxForm.abad.value = document.BoxForm.winda.value * 0.08;
}

function konversiDasa()
{
	document.BoxForm.sec.value = document.BoxForm.dasa.value * 315363265.1;
	document.BoxForm.min.value = document.BoxForm.dasa.value * 5256054.418;
	document.BoxForm.jam.value = document.BoxForm.dasa.value * 87600.90696;
	document.BoxForm.hari.value = document.BoxForm.dasa.value * 3650.03779;
	document.BoxForm.minggu.value = document.BoxForm.dasa.value * 521.43397;
	document.BoxForm.bl.value = document.BoxForm.dasa.value * 120;
	document.BoxForm.th.value = document.BoxForm.dasa.value * 10;
	document.BoxForm.lust.value = document.BoxForm.dasa.value * 2;
	document.BoxForm.winda.value = document.BoxForm.dasa.value * 1.25;
	document.BoxForm.abad.value = document.BoxForm.dasa.value * 0.1;
}

function konversiAbad()
{
	document.BoxForm.sec.value = document.BoxForm.abad.value * 3153632651;
	document.BoxForm.min.value = document.BoxForm.abad.value * 525605441.8;
	document.BoxForm.jam.value = document.BoxForm.abad.value * 876009.0696;
	document.BoxForm.hari.value = document.BoxForm.abad.value * 36500.3779;
	document.BoxForm.minggu.value = document.BoxForm.abad.value * 5214.3397;
	document.BoxForm.bl.value = document.BoxForm.abad.value * 1200;
	document.BoxForm.th.value = document.BoxForm.abad.value * 100;
	document.BoxForm.lust.value = document.BoxForm.abad.value * 2;
	document.BoxForm.winda.value = document.BoxForm.abad.value * 12.5;
	document.BoxForm.dasa.value = document.BoxForm.abad.value * 10;
}