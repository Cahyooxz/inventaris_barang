new DataTable('#table',{
    language: {
        "search": "Cari User :",
        "zeroRecords": "Data Users Tidak Ditemukan"
    }
});
// datatables
new DataTable('#table-barang', {
    language: {
        "search": "Cari Barang :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img src='image/data_barang.png' alt=''><p class='fw-semibold mb-0'>Data Barang Tidak Ditemukan</p></div>"
    }
});
new DataTable('#table-pembelian', {
    language: {
        "search": "Cari Data Pembelian Barang :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img src='image/data_pembelian.png' alt=''><p class='fw-semibold mb-0'>Data Pembelian Barang Tidak Ditemukan</p></div>"
    }
});
new DataTable('#table-pemakaian', {
    language: {
        "search": "Cari Data Pemakaian :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img src='image/data_pemakaian.png' alt=''><p class='fw-semibold mb-0'>Data Pemakaian Barang Tidak Ditemukan</p></div>"
    }
});
new DataTable('#table-inventaris', {
    language: {
        "search": "Cari Data Inventaris Barang :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img src='image/data_inventaris.png' alt=''><p class='fw-semibold mb-0'>Data Inventaris Barang Tidak Ditemukan</p></div>"
    }
});
new DataTable('#table-ruangan', {
    language: {
        "search": "Cari Data Ruangan :",
        "zeroRecords": "<div class='alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center' style='height: 80vh'><img src='image/data_ruangan.png' alt=''><p class='fw-semibold mb-0'>Data Ruangan Tidak Ditemukan</p></div>"
    }
});

const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click",() => {
    toggleLocalStorage();
    toggleRootClass();
});

function toggleRootClass(){
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme',inverted);
}

function toggleLocalStorage(){
    if(isLight()){
        localStorage.removeItem("light");
    }else{
        localStorage.setItem("light","set");
    }
}

function isLight(){
    return localStorage.getItem("light");
}

if(isLight()){
    toggleRootClass();
}