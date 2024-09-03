function rumusGLBS()
{
	var v = document.RumusForm.v.value;
	var t = document.RumusForm.t.value;
	
	var hasil = v*t;
	document.getElementById("tester").innerHTML = "Hasil penghitungan jarak = " + hasil + " m.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusGLBT()
{
	var v = document.RumusForm.v.value;
	var s = document.RumusForm.s.value;
	
	var hasil = s/v;
	document.getElementById("tester").innerHTML = "Hasil penghitungan waktu = " + hasil + " s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

//untuk GLBB
function rumusLBBS()
{
	var accel = document.RumusForm.aGLBB.value;
	var kecepatanAwal = document.RumusForm.voGLBB.value;
	var waktu = document.RumusForm.tGLBB.value;
	
	var hasil = kecepatanAwal * waktu + 1/2 * accel * waktu * waktu;
	document.getElementById("tester").innerHTML = "Hasil penghitungan jarak = " + hasil + " meter.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}
function rumusLBBVO()
{
	var accel = document.RumusForm.aGLBB.value;
	var waktu = document.RumusForm.tGLBB.value;
	var jarak = document.RumusForm.sGLBB.value;
	
	var hasil = (jarak - 1/2 * accel * waktu * waktu) / waktu;
	document.getElementById("tester").innerHTML = "Hasil penghitungan kecepatan awal = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusLBBA()
{
	var waktu = document.RumusForm.tGLBB.value;
	var jarak = document.RumusForm.sGLBB.value;
	var kecepatanAwal = document.RumusForm.voGLBB.value;
	
	var hasil = ((2 * jarak) - (2 * kecepatanAwal * waktu)) / (waktu * waktu);
	document.getElementById("tester").innerHTML = "Hasil penghitungan percepatan = " + hasil + " m/s<sup>2</sup>.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

//untuk GMB
function rumusFSGMB()
{
	var kecLinear = document.RumusForm.vGMB.value;
	var kecSudut = document.RumusForm.omegaGMB.value;
	var aSentripetal = document.RumusForm.asGMB.value;
	var r = document.RumusForm.rGMB.value;
	var massa = document.RumusForm.mGMB.value;
	
	var hasil = massa * kecLinear * kecLinear / r;
	document.getElementById("tester").innerHTML = "Hasil penghitungan gaya sentripetal = " + hasil + " N.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusasGMB()
{
	var kecLinear = document.RumusForm.vGMB.value;
	var r = document.RumusForm.rGMB.value;
	
	var hasil = kecLinear * kecLinear / r;
	document.getElementById("tester").innerHTML = "Hasil penghitungan percepatan sentripetal = " + hasil + " m/s<sup>2</sup>.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusVLGMB_KS()
{
	var kecSudut = document.RumusForm.omegaGMB.value;
	var r = document.RumusForm.rGMB.value;
	
	var hasil = kecSudut * r;
	document.getElementById("tester").innerHTML = "Hasil penghitungan kecepatan linear = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusVLGMB_PS()
{
	var aSentripetal = document.RumusForm.asGMB.value;
	var r = document.RumusForm.rGMB.value;
	
	var hasil = Math.sqrt(aSentripetal * r);
	document.getElementById("tester").innerHTML = "Hasil penghitungan kecepatan linear = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusVSGMB()
{
	var kecLinear = document.RumusForm.vGMB.value;
	var r = document.RumusForm.rGMB.value;
	
	var hasil = kecLinear/r;
	document.getElementById("tester").innerHTML = "Hasil penghitungan kecepatan sudut = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

//untuk GMBB
function rumusv0GMBB_t()
{
	var ksawal = document.RumusForm.v0GMBB.value;
	var ksakhir = document.RumusForm.vtGMBB.value;
	var aTangens = document.RumusForm.atGMBB.value;
	var aSudut = document.RumusForm.asGMBB.value;
	var aTotal = document.RumusForm.atotalGMBB.value;
	var lintasan = document.RumusForm.thetaGMBB.value;
	var waktu = document.RumusForm.tGMBB.value;
	
	var hasil = ksakhir - aSudut * waktu;
	document.getElementById("tester").innerHTML = "Hasil penghitungan kecepatan sudut awal = " + hasil + " rad/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusvtGMBB_t()
{
	var ksawal = document.RumusForm.v0GMBB.value;
	var aSudut = document.RumusForm.asGMBB.value;
	var waktu = document.RumusForm.tGMBB.value;
	
	var hasil = ksawal + aSudut * waktu;
	document.getElementById("tester").innerHTML = "Hasil penghitungan kecepatan sudut akhir = " + hasil + " rad/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusv0GMBB_theta()
{
	var aSudut = document.RumusForm.asGMBB.value;
	var lintasan = document.RumusForm.thetaGMBB.value;
	var waktu = document.RumusForm.tGMBB.value;
	
	var hasil = (lintasan - 1/2 * aSudut * waktu * waktu) / waktu;
	document.getElementById("tester").innerHTML = "Hasil penghitungan kecepatan sudut awal = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusvtGMBB_theta()
{
	var ksawal = document.RumusForm.v0GMBB.value;
	var aSudut = document.RumusForm.asGMBB.value;
	var lintasan = document.RumusForm.thetaGMBB.value;
	
	var hasil = Math.sqrt(ksawal * ksawal + 2 * aSudut * lintasan);
	document.getElementById("tester").innerHTML = "Hasil penghitungan kecepatan sudut akhir = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusatGMBB()
{
	var aSudut = document.RumusForm.asGMBB.value;
	var r = document.RumusForm.rGMBB.value;
	
	var hasil = aSudut * r;
	document.getElementById("tester").innerHTML = "Hasil penghitungan percepatan tangensial = " + hasil + " m/s<sup>2</sup>.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusasGMBB()
{
	var ksawal = document.RumusForm.v0GMBB.value;
	var ksakhir = document.RumusForm.vtGMBB.value;
	var waktu = document.RumusForm.tGMBB.value;
	
	var hasil = (ksawal - ksakhir) / waktu;
	document.getElementById("tester").innerHTML = "Hasil penghitungan percepatan sudut = " + hasil + " m/s<sup>2</sup>.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusatotalGMBB()
{
	var aTangens = document.RumusForm.atGMBB.value;
	var aSentri = document.RumusForm.asentripGMBB.value;
	
	var hasil = Math.sqrt(aSentri * aSentri + aTangens * aTangens);
	document.getElementById("tester").innerHTML = "Hasil penghitungan percepatan total = " + hasil + " m/s<sup>2</sup>.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusthetaGMBB()
{
	var ksawal = document.RumusForm.v0GMBB.value;
	var aSudut = document.RumusForm.asGMBB.value;
	var waktu = document.RumusForm.tGMBB.value;
	
	var hasil = ksawal * waktu + 1/2 * aSudut * waktu * waktu;
	document.getElementById("tester").innerHTML = "Hasil penghitungan percepatan total = " + hasil + " m/s<sup>2</sup>.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusasentripGMBB()
{
	var ksawal = document.RumusForm.v0GMBB.value;
	var ksakhir = document.RumusForm.vtGMBB.value;
	var aTangens = document.RumusForm.atGMBB.value;
	var aSudut = document.RumusForm.asGMBB.value;
	var aTotal = document.RumusForm.atotalGMBB.value;
	var lintasan = document.RumusForm.thetaGMBB.value;
	
	var hasil = Math.sqrt(aTotal * aTotal - aTangens * aTangens);
	document.getElementById("tester").innerHTML = "Hasil penghitungan percepatan sentripetal = " + hasil + " m/s<sup>2</sup>.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

//untuk gerak parabola
function rumusParabolaVX()
{
	var v0 = document.RumusForm.parabolaV0.value;
	var sudut = document.RumusForm.parabolaSudut.value;
	
	var hasil = v0 * Math.cos(sudut/57.29578);
	document.getElementById("testerV").innerHTML = "Hasil penghitungan kecepatan pada sumbu X = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaVY()
{
	var v0 = document.RumusForm.parabolaV0.value;
	var sudut = document.RumusForm.parabolaSudut.value;
	var t = document.RumusForm.parabolaT.value;
	var g = 9.8;
	
	var hasil = v0 * Math.sin(sudut/57.29578) - g * t;
	document.getElementById("testerV").innerHTML = "Hasil penghitungan kecepatan pada sumbu Y = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaVT()
{
	var v0 = document.RumusForm.parabolaV0.value;
	var vx = document.RumusForm.parabolaX.value;
	var vy = document.RumusForm.parabolaY.value;
	var sudut = document.RumusForm.parabolaSudut.value;
	var t = document.RumusForm.parabolaT.value;
	var g = 9.8;
	
	var hasil = Math.sqrt(vx * vx + vy * vy);
	document.getElementById("testerV").innerHTML = "Hasil penghitungan kecepatan kombinasi = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaSudut_X()
{
	var v0 = document.RumusForm.parabolaV0.value;
	var vx = document.RumusForm.parabolaX.value;
	
	var hasil = Math.acos(vx / v0) * 57.29578;
	document.getElementById("testerV").innerHTML = "Hasil penghitungan sudut elevasi = " + hasil + " derajat.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaSudut_Y()
{
	var v0 = document.RumusForm.parabolaV0.value;
	var vy = document.RumusForm.parabolaSudut_WTT.value;
	var t = document.RumusForm.parabolaT.value;
	var g = 9.8;
	
	var hasil = Math.asin((vy + g )* t / v0) * 57.29578;
	document.getElementById("testerV").innerHTML = "Hasil penghitungan sudut elevasi = " + hasil + " derajat.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaV0_WTT()
{
	var sudut = document.RumusForm.parabolaSudut_WTT.value;
	var t = document.RumusForm.parabolaT_WTT.value;
	var g = 9.8;
	
	var hasil = g * t / Math.sin(sudut/57.29578);
	document.getElementById("testerWTT").innerHTML = "Hasil penghitungan kecepatan awal = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaSudut_WTT()
{
	var v0 = document.RumusForm.parabolaV0_WTT.value;
	var t = document.RumusForm.parabolaT_WTT.value;
	var g = 9.8;
	
	var hasil = Math.asin(g*t / v0) * 57.29578;
	document.getElementById("testerWTT").innerHTML = "Hasil penghitungan sudut = " + hasil + " derajat.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaT_WTT()
{
	var v0 = document.RumusForm.parabolaV0_WTT.value;
	var sudut = document.RumusForm.parabolaSudut_WTT.value;
	var g = 9.8;
	
	var hasil = v0 * Math.sin(sudut/57.29578) / g;
	document.getElementById("testerWTT").innerHTML = "Hasil penghitungan waktu = " + hasil + " s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaV0_TT()
{
	var sudut = document.RumusForm.parabolaSudut_TT.value;
	var h = document.RumusForm.parabolaH_TT.value;
	var g = 9.8;
	
	//sin^2(x) = 1/2[1 – cos(2x)]
	var hasil = Math.sqrt(4 * g * h / (1 - Math.cos(2 * sudut / 57.29578)));
	document.getElementById("testerHTT").innerHTML = "Hasil penghitungan kecepatan awal = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaSudut_TT()
{
	var v0 = document.RumusForm.parabolaV0_TT.value;
	var h = document.RumusForm.parabolaH_TT.value;
	var g = 9.8;
	
	//sin^2(x) = 1/2[1 – cos(2x)]
	var hasil = Math.acos((1 - 4*g*h / (v0*v0))/2) * 57.29578;
	document.getElementById("testerHTT").innerHTML = "Hasil penghitungan sudut = " + hasil + " derajat.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaH_TT()
{
	var v0 = document.RumusForm.parabolaV0_TT.value;
	var sudut = document.RumusForm.parabolaSudut_TT.value;
	var g = 9.8;
	
	//sin^2(x) = 1/2[1 – cos(2x)]
	var hasil = v0 * v0 * 1/2 * (1 - Math.cos(2 * sudut / 57.29578)) / 2 * g;
	document.getElementById("testerHTT").innerHTML = "Hasil penghitungan tinggi maksimum = " + hasil + " m.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaV0_JT()
{
	var v0 = document.RumusForm.parabolaV0_JT.value;
	var sudut = document.RumusForm.parabolaSudut_JT.value;
	var x = document.RumusForm.parabolaX_JT.value;
	var g = 9.8;
	
	//sin^2(x) = 1/2[1 – cos(2x)]
	var hasil = Math.sqrt(x * g / Math.sin(2 * sudut / 57.29578));
	document.getElementById("testerJTT").innerHTML = "Hasil penghitungan kecepatan awal = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaSudut_JT()
{
	var v0 = document.RumusForm.parabolaV0_JT.value;
	var x = document.RumusForm.parabolaX_JT.value;
	var g = 9.8;
	
	//sin^2(x) = 1/2[1 – cos(2x)]
	var hasil = Math.asin(g * x / (2 * v0 * v0)) * 57.29578;
	document.getElementById("testerJTT").innerHTML = "Hasil penghitungan sudut = " + hasil + " derajat.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusParabolaX_JT()
{
	var v0 = document.RumusForm.parabolaV0_JT.value;
	var sudut = document.RumusForm.parabolaSudut_JT.value;
	var x = document.RumusForm.parabolaX_JT.value;
	var g = 9.8;
	
	//sin^2(x) = 1/2[1 – cos(2x)]
	var hasil = v0 * v0 * Math.sin(2 * sudut / 57.29578) / g;
	document.getElementById("testerJTT").innerHTML = "Hasil penghitungan jarak terjauh = " + hasil + " derajat.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

//untuk Hukum Newton
function rumusMassaHK()
{
	var m = document.RumusForm.hnM.value;
	var a = document.RumusForm.hnA.value;
	var f = document.RumusForm.hnF.value;
	
	var hasil = f/a;
	document.getElementById("tester").innerHTML = "Hasil penghitungan massa = " + hasil + " kg.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusMHK()
{
	var a = document.RumusForm.hnA.value;
	var f = document.RumusForm.hnF.value;
	
	var hasil = f/a;
	document.getElementById("tester").innerHTML = "Hasil penghitungan massa = " + hasil + " kg.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusAHK()
{
	var m = document.RumusForm.hnM.value;
	var a = document.RumusForm.hnA.value;
	var f = document.RumusForm.hnF.value;
	
	var hasil = f/m;
	document.getElementById("tester").innerHTML = "Hasil penghitungan akselerasi = " + hasil + " m/s<sup2></sup>.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusGayaHK()
{
	var m = document.RumusForm.hnM.value;
	var a = document.RumusForm.hnA.value;
	
	var hasil = m * a;
	document.getElementById("tester").innerHTML = "Hasil penghitungan gaya = " + hasil + " N.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusGravM1()
{
	var m2 = document.RumusForm.gravM2.value; 
	var r = document.RumusForm.gravR.value; 
	var f = document.RumusForm.gravF.value; 
	var G = 6.672 * 0.00000000001;
	
	var hasil = f * r * r / (G * m2);
	document.getElementById("tester").innerHTML = "Hasil penghitungan massa benda 1 = " + hasil + " kg.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusGravM2()
{
	var m1 = document.RumusForm.gravM1.value; 
	var m2 = document.RumusForm.gravM2.value; 
	var r = document.RumusForm.gravR.value; 
	var f = document.RumusForm.gravF.value; 
	var G = 6.672 * 0.00000000001;
	
	var hasil = (f * r * r) / (G * m1);
	document.getElementById("tester").innerHTML = "Hasil penghitungan massa benda 2 = " + hasil + " kg.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusGravR()
{
	var m1 = document.RumusForm.gravM1.value; 
	var m2 = document.RumusForm.gravM2.value; 
	var f = document.RumusForm.gravF.value; 
	var G = 6.672 * 0.00000000001;
	
	var hasil = Math.sqrt(G * m1 * m2 / f);
	document.getElementById("tester").innerHTML = "Hasil penghitungan jarak ke pusat benda = " + hasil + " m.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusGravF()
{
	var m1 = document.RumusForm.gravM1.value; 
	var m2 = document.RumusForm.gravM2.value; 
	var G = 6.672 * 0.00000000001;
	var r = document.RumusForm.gravR.value; 
	
	var hasil = G * m1 * m2 / (r * r);
	document.getElementById("tester").innerHTML = "Hasil penghitungan gaya gravitasi = " + hasil + " N.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusRotasiI()
{
	var bentuk = document.RumusForm.bentukR.value;
	var m = document.RumusForm.rotasiM.value;
	var r = document.RumusForm.rotasiR.value;
	var l = document.RumusForm.rotasiL.value;
	var hasil;
	
	switch(bentuk){
		case "bspu" : hasil = 1/12 * m * l * l; break;
		case "bspp" : hasil = 1/3 * m * l * l; break;
		case "sbr" : hasil = m * r * r; break;
		case "spLalui" : hasil = 1/2 * m * r * r; break;
		case "spLintang" : hasil = 1/4 * m * r * r + 1/12 * m * l * l; break;
		case "bmd" : hasil = 2/5 * m * r * r; break;
		case "bmds" : hasil = 7/5 * m * r * r; break;
		case "bbr" : hasil = 2/3 * m * r * r; break;
	}
	//document.getElementById("tester").innerHTML = bentuk;
	document.getElementById("tester").innerHTML = "Hasil penghitungan momen inersia = " + hasil + " kg m<sup>2</sup>.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

//untuk usaha dan energi
function rumusUsahaWDS()
{
	var f = document.RumusForm.usahaF_Usaha.value;
	var s = document.RumusForm.usahaS_Usaha.value;
	var theta = document.RumusForm.usahaTheta_Usaha.value;
	
	var hasil = f * s * Math.cos(theta / 57.29578);
	document.getElementById("testerUsaha").innerHTML = "Hasil penghitungan usaha = " + hasil + " joule.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusUsahaWTS()
{
	var f = document.RumusForm.usahaF_Usaha.value;
	var s = document.RumusForm.usahaS_Usaha.value;
	
	var hasil = f * s;
	document.getElementById("testerUsaha").innerHTML = "Hasil penghitungan usaha = " + hasil + " joule.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusUsahaFDS()
{
	var s = document.RumusForm.usahaS_Usaha.value;
	var theta = document.RumusForm.usahaTheta_Usaha.value;
	var usaha = document.RumusForm.usahaW_Usaha.value;
	
	var hasil = usaha / (s * Math.cos(theta / 57.29578));
	document.getElementById("testerUsaha").innerHTML = "Hasil penghitungan gaya = " + hasil + " N.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusUsahaFTS()
{
	var w = document.RumusForm.usahaW_Usaha.value;
	var s = document.RumusForm.usahaS_Usaha.value;
	
	var hasil = w / s;
	document.getElementById("testerUsaha").innerHTML = "Hasil penghitungan gaya = " + hasil + " N.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusUsahaE_EK()
{
	var m = document.RumusForm.usahaM_EK.value;
	var v = document.RumusForm.usahaV_EK.value;
	var e = document.RumusForm.usahaE_EK.value;
	
	var hasil = 1/2 * m * v * v;
	document.getElementById("testerEK").innerHTML = "Hasil penghitungan energi kinetik = " + hasil + " joule.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusUsahaV_EK()
{
	var m = document.RumusForm.usahaM_EK.value;
	var v = document.RumusForm.usahaV_EK.value;
	var e = document.RumusForm.usahaE_EK.value;
	
	var hasil = Math.sqrt(2 * e / m);
	document.getElementById("testerEK").innerHTML = "Hasil penghitungan kecepatan = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusUsahaE_EP()
{
	var m = document.RumusForm.usahaM_EP.value;
	var h = document.RumusForm.usahaH_EP.value;
	var g = 9.8;
	//var e = document.RumusForm.usahaE_EP.value;
	
	var hasil = m * g * h;
	document.getElementById("testerEP").innerHTML = "Hasil penghitungan energi potensial = " + hasil + " joule.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusUsahaH_EP()
{
	var m = document.RumusForm.usahaM_EP.value;
	var g = 9.8;
	var e = document.RumusForm.usahaE_EP.value;
	
	var hasil = e / (g * m);
	document.getElementById("testerEP").innerHTML = "Hasil penghitungan kedudukkan = " + hasil + " m.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

//untuk elastisitas
function rumusElasGaya()
{
	var k = document.RumusForm.elasK.value;
	var dx = document.RumusForm.elasDX.value;
	
	var hasil = k * dx;
	document.getElementById("tester").innerHTML = "Hasil penghitungan gaya tarik = " + hasil + " N.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusElasKonst()
{
	var f = document.RumusForm.elasF.value;
	var k = document.RumusForm.elasK.value;
	var dx = document.RumusForm.elasDX.value;
	
	var hasil = f / dx;
	document.getElementById("tester").innerHTML = "Hasil penghitungan konstanta pegas = " + hasil + " N/m.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusElasPT()
{
	var f = document.RumusForm.elasF.value;
	var k = document.RumusForm.elasK.value;
	
	var hasil = f / k;
	document.getElementById("tester").innerHTML = "Hasil penghitungan pertambahan panjang = " + hasil + " m.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

//untuk momentum dan impuls
function rumusMomenP()
{
	var m = document.RumusForm.momentM.value;
	var v = document.RumusForm.momentV.value;
	
	var hasil = m * v;
	document.getElementById("testerMomentum").innerHTML = "Hasil penghitungan momentum = " + hasil + " kg m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusMomenV()
{
	var m = document.RumusForm.momentM.value;
	var p = document.RumusForm.momentP.value;
	
	var hasil = p / m;
	document.getElementById("testerMomentum").innerHTML = "Hasil penghitungan kecepatan = " + hasil + " m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusMomenM()
{
	var v = document.RumusForm.momentV.value;
	var p = document.RumusForm.momentP.value;
	
	var hasil = p / v;
	document.getElementById("testerMomentum").innerHTML = "Hasil penghitungan massa = " + hasil + " kg.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusImpulsI()
{
	var t = document.RumusForm.impulsT.value;
	var f = document.RumusForm.impulsF.value;
	
	var hasil = f * t;
	document.getElementById("testerImpuls").innerHTML = "Hasil penghitungan impuls = " + hasil + " kg m/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusImpulsF()
{
	var t = document.RumusForm.impulsT.value;
	var i = document.RumusForm.impulsI.value;
	
	var hasil = i / t;
	document.getElementById("testerImpuls").innerHTML = "Hasil penghitungan gaya = " + hasil + " N.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

//untuk termodinamika
function rumusKalorM()
{
	var m = document.RumusForm.kalorM.value;
	var c = document.RumusForm.kalorC.value;
	var to = document.RumusForm.kalorTO.value;
	var tt = document.RumusForm.kalorTT.value;
	var q = document.RumusForm.kalorQ.value;
	
	var hasil = q / (c * (tt-to));
	document.getElementById("tester").innerHTML = "Hasil penghitungan massa = " + hasil + " kg.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusKalorC()
{
	var m = document.RumusForm.kalorM.value;
	var c = document.RumusForm.kalorC.value;
	var to = document.RumusForm.kalorTO.value;
	var tt = document.RumusForm.kalorTT.value;
	var q = document.RumusForm.kalorQ.value;
	
	var hasil = q / (m * (tt-to));
	document.getElementById("tester").innerHTML = "Hasil penghitungan kalor jenis = " + hasil + " J/kg<sup>o</sup>C.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusKalorQ()
{
	var m = document.RumusForm.kalorM.value;
	var c = document.RumusForm.kalorC.value;
	var to = document.RumusForm.kalorTO.value;
	var tt = document.RumusForm.kalorTT.value;
	
	var hasil = m * c * (tt-to);
	document.getElementById("tester").innerHTML = "Hasil penghitungan kalor yang dilepas/terima = " + hasil + " J.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

//untuk perpindahan kalor
function rumusKondK()
{
	var a = document.RumusForm.kondA.value;
	var to = document.RumusForm.kondTO.value;
	var tt = document.RumusForm.kondTT.value;
	var l = document.RumusForm.kondL.value;
	var h = document.RumusForm.kondH.value;
	
	var hasil = h * l /(a * (tt-to));
	document.getElementById("testerKonduksi").innerHTML = "Hasil penghitungan konduktivitas termal = " + hasil + " W/m K.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusKondT()
{
	var q = document.RumusForm.kondQ.value;
	var h = document.RumusForm.kondH.value;
	
	var hasil = q/h;
	document.getElementById("testerKonduksi").innerHTML = "Hasil penghitungan waktu penyerapan = " + hasil + " s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusKondH_T()
{
	var q = document.RumusForm.kondQ.value;
	var t = document.RumusForm.kondT.value;
	
	var hasil = q/t;
	document.getElementById("testerKonduksi").innerHTML = "Hasil penghitungan kecepatan rambat = " + hasil + " J/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusKondH_L()
{
	var k = document.RumusForm.kondK.value;
	var a = document.RumusForm.kondA.value;
	var to = document.RumusForm.kondTO.value;
	var tt = document.RumusForm.kondTT.value;
	var l = document.RumusForm.kondL.value;
	
	var hasil = k * a * (tt-to) / l;
	document.getElementById("testerKonduksi").innerHTML = "Hasil penghitungan kecepatan rambat = " + hasil + " J/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}
function rumusKonvK()
{
	var a = document.RumusForm.konvA.value;
	var to = document.RumusForm.konvTO.value;
	var tt = document.RumusForm.konvTT.value;
	var h = document.RumusForm.konvH.value;
	
	var hasil = h / (a * (tt-to));
	document.getElementById("testerKonveksi").innerHTML = "Hasil penghitungan koefisien konveksi = " + hasil + " J/s m<sup>2</sup> K.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusKonvT()
{
	var q = document.RumusForm.konvQ.value;
	var h = document.RumusForm.konvH.value;
	
	var hasil = q/h;
	document.getElementById("testerKonveksi").innerHTML = "Hasil penghitungan waktu rambatan = " + hasil + " s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusKonvH_T()
{
	var q = document.RumusForm.konvQ.value;
	var t = document.RumusForm.konvT.value;
	
	var hasil = q/t;
	document.getElementById("testerKonveksi").innerHTML = "Hasil penghitungan laju konveksi = " + hasil + " J/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusKonvH_L()
{
	var a = document.RumusForm.konvA.value;
	var to = document.RumusForm.konvTO.value;
	var tt = document.RumusForm.konvTT.value;
	var h = document.RumusForm.konvH.value;
	
	var hasil = h * a * (tt-to);
	document.getElementById("testerKonveksi").innerHTML = "Hasil penghitungan laju konveksi = " + hasil + " J/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusRadE()
{
	var a = document.RumusForm.radA.value;
	var tt = document.RumusForm.radTT.value;
	var h = document.RumusForm.radH.value;
	var tao = 0.0000000567;
						
	var hasil = h/(tao * a * tt * tt * tt * tt);
	document.getElementById("testerRadiasi").innerHTML = "Hasil penghitungan emisivitas = " + hasil + ".<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusRadT()
{
	var q = document.RumusForm.radQ.value;
	var h = document.RumusForm.radH.value;
						
	var hasil = q/h;
	document.getElementById("testerRadiasi").innerHTML = "Hasil penghitungan waktu penyerapan = " + hasil + " s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusRadH_T()
{
	var q = document.RumusForm.radQ.value;
	var t = document.RumusForm.radT.value;
						
	var hasil = q/t;
	document.getElementById("testerRadiasi").innerHTML = "Hasil penghitungan kecepatan penyerapan = " + hasil + " J/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}

function rumusRadH_L()
{
	var e = document.RumusForm.radE.value;
	var a = document.RumusForm.radA.value;
	var tt = document.RumusForm.radTT.value;
	var tao = 0.0000000567;
						
	var hasil = tao * e * a * tt * tt * tt * tt;
	document.getElementById("testerRadiasi").innerHTML = "Hasil penghitungan kecepatan penyerapan = " + hasil + " J/s.<br><b>Perhatian ! </b>Angka pada input diatas tidak memberikan hasil hitungan";
}