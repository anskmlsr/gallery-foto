var segmentTerakhir = window.location.href.split('/').pop();

$.ajax({
    url: window.location.origin +'/explore-detail/'+segmentTerakhir+'/getdatadetail',
    type: "GET",
    dataType: "JSON",
    success: function(res){
    console.log(res)
    $('#fotodetail').prop('src', '/assets/'+res.dataDetailFoto.url)
    $('#judulfoto').html(res.dataDetailFoto.judul_foto)
    $('#deskripsifoto').html(res.dataDetailFoto.deskripsi_foto)
    $('#username').html(res.dataDetailFoto.user.nama_lengkap)
    $('#fotouser').prop('src', '/assets/'+res.dataDetailFoto.user.url)
    ambilKomentar()

    },
    error: function(jqXHR, textStatus, errorThrown){
        alert('gagal')
    }
})

function ambilKomentar(){
    $.getJSON(window.location.origin +'/explore-detail/getComment/'+segmentTerakhir, function(res){
        console.log(res)
        if(res.data.length === 0){
            $('#listkomentar').html('<div>Belum ada komentar</div>')
        } else {
            comment= []
            res.data.map((x)=>{
                let datacomentar = {
                    idUser: x.user.id,
                    pengirim: x.user.nama_lengkap,
                    waktu: x.created_at,
                    isikomentar: x.isi_komentar,
                    potopengirim: x.user.url
                }
                comment.push(datacomentar);
            })
            tampilkankomentar()
        }
    })
}

const tampilkankomentar = ()=>{
    $('#listkomentar').html('')
    comment.map((x, i)=>{
        $('#listkomentar').append(`
        <div class="flex flex-row justify-start mt-4">
                            <div class="w-1/4">
                                <img src="/assets/${x.potopengirim}" class="w-8 h-auto" alt="">
                            </div>
                            <div class="flex flex-col mr-2">
                               <h5 class="text-sm">${x.pengirim}</h5>
                                <small class="text-xs text-abuabu">${x.waktu}</small>
                            </div>
                            <h5 class="text-sm">${x.isikomentar}</h5>
                        </div>
        `)
    })
}

function kirimkomentar(){
    $.ajax({
        url: window.location.origin +'/explore-detail-kirimkomentar',
        type: "POST",
        dataType: "JSON",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: segmentTerakhir,
            isi_komentar: $('input[name="textkomentar"]').val()
        },
        success: function(res){
            $('input[name="textkomentar"]').val('');
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('gagal mengirim komentar')
        }
    })
}

