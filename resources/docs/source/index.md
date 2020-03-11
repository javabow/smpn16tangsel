---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://iparkir.id/docs/collection.json)

<!-- END_INFO -->

#Promosi Tenants

APIs for managing promosi tenants
<!-- START_fbcab394d526a0bde3e1a49ff0170ff6 -->
## api/tenants-promo
Api Promosi Tenants, select TenantsPromo, TenantsPromo Location, TenantsPromo Fotos, Tenants, Tenants Locations, Tenants Fotos, Tenants Opening Hours.

> Example request:

```bash
curl -X GET \
    -G "http://iparkir.id/api/tenants-promo?where=id%2C%21%3D%2C1&orderBy=id%2CDESC&limit=3&offset=2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://iparkir.id/api/tenants-promo"
);

let params = {
    "where": "id,!=,1",
    "orderBy": "id,DESC",
    "limit": "3",
    "offset": "2",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "data": [
        {
            "id": 3,
            "product_name": "Promo JSM Alfamart",
            "promo_date": "2019-12-06",
            "promo_end_date": "2019-12-08",
            "description": null,
            "more_info": null,
            "deleted_at": null,
            "created_at": "2019-12-07 13:45:53",
            "updated_at": "2019-12-07 13:45:53",
            "id_tenants": 3,
            "fotos": [
                {
                    "id": 6,
                    "name": "\/photos\/1\/alfamart-jsm.jpg",
                    "path": "\/photos\/1\/alfamart-jsm.jpg",
                    "created_at": "2019-12-07 13:45:53",
                    "updated_at": "2019-12-07 13:45:53",
                    "id_tenants_promo": 3
                }
            ],
            "locations": [
                {
                    "id": 11,
                    "name": "Alfamart Karang Tengah 2",
                    "address": "Alfamart Karang Tengah 2",
                    "lat": "-6.34248500",
                    "lng": "106.72523800",
                    "created_at": "2019-12-07 13:45:53",
                    "updated_at": "2019-12-07 13:45:53",
                    "id_tenants_promo": 3
                },
                {
                    "id": 12,
                    "name": "Alfamart Jatiluhur",
                    "address": "Jalan Bendungan Hilir Raya No.22, RT.10\/RW.01, Bendungan Hilir, Tanah Abang, RT.10\/RW.1, Bend. Hilir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270",
                    "lat": "-6.21495100",
                    "lng": "106.81329300",
                    "created_at": "2019-12-07 13:45:53",
                    "updated_at": "2019-12-07 13:45:53",
                    "id_tenants_promo": 3
                }
            ],
            "tenants": {
                "id": 3,
                "name": "Alfamart",
                "description": "<p>Alfamart.. Belanja Puas.. Harga Pas..<\/p>",
                "phone": "021 5575 5966",
                "more_info": null,
                "deleted_at": null,
                "created_at": "2019-12-07 12:35:46",
                "updated_at": "2019-12-07 12:46:44",
                "id_users": 1,
                "fotos": [
                    {
                        "id": 12,
                        "name": "\/photos\/1\/head-office-alfamart.jpg",
                        "path": "\/photos\/1\/head-office-alfamart.jpg",
                        "created_at": "2019-12-07 12:46:44",
                        "updated_at": "2019-12-07 12:46:44",
                        "id_tenants": 3
                    }
                ],
                "locations": [
                    {
                        "id": 8,
                        "name": "Kantor Pusat Alfamart",
                        "address": "Jl. MH Thamrin No.9, Cikokol Tangerang 15117, Banten - Indonesia",
                        "lat": "-6.21374230",
                        "lng": "106.62795480",
                        "created_at": "2019-12-07 12:46:44",
                        "updated_at": "2019-12-07 12:46:44",
                        "id_tenants": 3
                    }
                ],
                "opening_hours": [
                    {
                        "id": 50,
                        "day": "senin",
                        "open_time": "7:00 AM",
                        "close_time": "8:00 PM",
                        "created_at": "2019-12-07 12:46:44",
                        "updated_at": "2019-12-07 12:46:44",
                        "id_tenants": 3
                    },
                    {
                        "id": 51,
                        "day": "selasa",
                        "open_time": "7:00 AM",
                        "close_time": "8:00 PM",
                        "created_at": "2019-12-07 12:46:44",
                        "updated_at": "2019-12-07 12:46:44",
                        "id_tenants": 3
                    },
                    {
                        "id": 52,
                        "day": "rabu",
                        "open_time": "7:00 AM",
                        "close_time": "8:00 PM",
                        "created_at": "2019-12-07 12:46:44",
                        "updated_at": "2019-12-07 12:46:44",
                        "id_tenants": 3
                    },
                    {
                        "id": 53,
                        "day": "kamis",
                        "open_time": "7:00 AM",
                        "close_time": "8:00 PM",
                        "created_at": "2019-12-07 12:46:44",
                        "updated_at": "2019-12-07 12:46:44",
                        "id_tenants": 3
                    },
                    {
                        "id": 54,
                        "day": "jum'at",
                        "open_time": "7:00 AM",
                        "close_time": "8:00 PM",
                        "created_at": "2019-12-07 12:46:44",
                        "updated_at": "2019-12-07 12:46:44",
                        "id_tenants": 3
                    },
                    {
                        "id": 55,
                        "day": "sabtu",
                        "open_time": "-",
                        "close_time": "-",
                        "created_at": "2019-12-07 12:46:44",
                        "updated_at": "2019-12-07 12:46:44",
                        "id_tenants": 3
                    },
                    {
                        "id": 56,
                        "day": "minggu",
                        "open_time": "-",
                        "close_time": "-",
                        "created_at": "2019-12-07 12:46:44",
                        "updated_at": "2019-12-07 12:46:44",
                        "id_tenants": 3
                    }
                ]
            }
        },
        {
            "id": 2,
            "product_name": "KFC Zuper Box",
            "promo_date": "2019-12-01",
            "promo_end_date": "2019-12-14",
            "description": null,
            "more_info": null,
            "deleted_at": null,
            "created_at": "2019-12-07 13:37:14",
            "updated_at": "2019-12-07 13:37:14",
            "id_tenants": 1,
            "fotos": [
                {
                    "id": 5,
                    "name": "\/photos\/1\/kfc-zuper-box.jpg",
                    "path": "\/photos\/1\/kfc-zuper-box.jpg",
                    "created_at": "2019-12-07 13:37:15",
                    "updated_at": "2019-12-07 13:37:15",
                    "id_tenants_promo": 2
                }
            ],
            "locations": [
                {
                    "id": 8,
                    "name": "KFC CBD Ciledug",
                    "address": "Jl. HOS Cokroaminoto No.93, RT.001\/RW.001, Karang Tengah, Kec. Karang Tengah, Kota Tangerang, Banten 15157",
                    "lat": "-6.22363300",
                    "lng": "106.70896000",
                    "created_at": "2019-12-07 13:37:14",
                    "updated_at": "2019-12-07 13:37:14",
                    "id_tenants_promo": 2
                },
                {
                    "id": 9,
                    "name": "KFC Alam Sutra",
                    "address": "Jl. Boulevard Alam Sutera Kav. A, Kel. Pakualam, Kec. Serpong Utara, Pakualam, Kec. Serpong Utara, Kota Tangerang Selatan, Banten 15118",
                    "lat": "-6.23862400",
                    "lng": "106.65975200",
                    "created_at": "2019-12-06 23:08:36",
                    "updated_at": "2019-12-06 23:08:36",
                    "id_tenants_promo": 2
                },
                {
                    "id": 10,
                    "name": "KFC Pamulang Square",
                    "address": "Pamulang Square, Jl. Siliwangi No.12, Pamulang Bar., Kec. Pamulang, Tangerang, Banten 15417",
                    "lat": "-6.34248500",
                    "lng": "106.72523800",
                    "created_at": "2019-12-06 23:08:36",
                    "updated_at": "2019-12-06 23:08:36",
                    "id_tenants_promo": 2
                }
            ],
            "tenants": {
                "id": 1,
                "name": "KFC Indonesia",
                "description": "<p>Fast Food, American<\/p>",
                "phone": "0217182745",
                "more_info": "<p>Breakfast<br \/>\r\nHome Delivery<br \/>\r\nTakeaway Available<br \/>\r\nNo Alcohol Available<br \/>\r\nWifi<br \/>\r\nIndoor Seating<br \/>\r\nOutdoor Seating<\/p>",
                "deleted_at": null,
                "created_at": "2019-09-15 09:43:28",
                "updated_at": "2019-12-07 12:21:25",
                "id_users": 1,
                "fotos": [
                    {
                        "id": 8,
                        "name": "\/photos\/1\/head-office-kfc.jpg",
                        "path": "\/photos\/1\/head-office-kfc.jpg",
                        "created_at": "2019-12-07 12:21:26",
                        "updated_at": "2019-12-07 12:21:26",
                        "id_tenants": 1
                    }
                ],
                "locations": [
                    {
                        "id": 4,
                        "name": "PT FAST FOOD INDONESIA Tbk",
                        "address": "Jl. Let. Jend. Haryono M.T. Kav.7",
                        "lat": "-6.24170080",
                        "lng": "98.80949540",
                        "created_at": "2019-12-07 12:21:25",
                        "updated_at": "2019-12-07 12:21:25",
                        "id_tenants": 1
                    }
                ],
                "opening_hours": [
                    {
                        "id": 22,
                        "day": "senin",
                        "open_time": "8:00 AM",
                        "close_time": "10:00 PM",
                        "created_at": "2019-12-07 12:21:25",
                        "updated_at": "2019-12-07 12:21:25",
                        "id_tenants": 1
                    },
                    {
                        "id": 23,
                        "day": "selasa",
                        "open_time": "8:00 AM",
                        "close_time": "10:00 PM",
                        "created_at": "2019-12-07 12:21:26",
                        "updated_at": "2019-12-07 12:21:26",
                        "id_tenants": 1
                    },
                    {
                        "id": 24,
                        "day": "rabu",
                        "open_time": "8:00 AM",
                        "close_time": "10:00 PM",
                        "created_at": "2019-12-07 12:21:26",
                        "updated_at": "2019-12-07 12:21:26",
                        "id_tenants": 1
                    },
                    {
                        "id": 25,
                        "day": "kamis",
                        "open_time": "8:00 AM",
                        "close_time": "10:00 PM",
                        "created_at": "2019-12-07 12:21:26",
                        "updated_at": "2019-12-07 12:21:26",
                        "id_tenants": 1
                    },
                    {
                        "id": 26,
                        "day": "jum'at",
                        "open_time": "8:00 AM",
                        "close_time": "10:00 PM",
                        "created_at": "2019-12-07 12:21:26",
                        "updated_at": "2019-12-07 12:21:26",
                        "id_tenants": 1
                    },
                    {
                        "id": 27,
                        "day": "sabtu",
                        "open_time": "8:00 AM",
                        "close_time": "10:00 PM",
                        "created_at": "2019-12-07 12:21:26",
                        "updated_at": "2019-12-07 12:21:26",
                        "id_tenants": 1
                    },
                    {
                        "id": 28,
                        "day": "minggu",
                        "open_time": "8:00 AM",
                        "close_time": "10:00 PM",
                        "created_at": "2019-12-07 12:21:26",
                        "updated_at": "2019-12-07 12:21:26",
                        "id_tenants": 1
                    }
                ]
            }
        }
    ],
    "message": "Promosi Tenants berhasil diselect"
}
```

### HTTP Request
`GET api/tenants-promo`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `where` |  optional  | optional isi query string dengan 3 argumen, pisahkan dengan koma.  contoh: ?where=id,!=,1
    `orderBy` |  optional  | optional isi query string dengan 2 argumen, pisahkan dengan koma.  contoh: ?orderBy=id,DESC
    `limit` |  optional  | optional untuk membatasi banyak rows yang ditampilkan. contoh: ?limit=3.
    `offset` |  optional  | optional (hanya bisa dipakai jika menggunakan query limit). contoh: ?offset=2.

<!-- END_fbcab394d526a0bde3e1a49ff0170ff6 -->

#Tenants

APIs for managing tenants
<!-- START_b8b23cad934e85cedb406add43c9c137 -->
## api/tenants
Api Tenants, select Tenants, Tenants Locations, Tenants Fotos, Tenants Opening Hours.

> Example request:

```bash
curl -X GET \
    -G "http://iparkir.id/api/tenants?where=id%2C%21%3D%2C1&orderBy=id%2CDESC&limit=3&offset=2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://iparkir.id/api/tenants"
);

let params = {
    "where": "id,!=,1",
    "orderBy": "id,DESC",
    "limit": "3",
    "offset": "2",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "data": [
        {
            "id": 2,
            "name": "Ayam Geprek Bensu",
            "description": null,
            "phone": "(021) 7657260",
            "more_info": null,
            "deleted_at": null,
            "created_at": "2019-12-07 12:13:12",
            "updated_at": "2019-12-07 12:47:39",
            "id_users": 1,
            "fotos": [
                {
                    "id": 13,
                    "name": "\/photos\/1\/headofficebensu.jpg",
                    "path": "\/photos\/1\/headofficebensu.jpg",
                    "created_at": "2019-12-07 12:47:40",
                    "updated_at": "2019-12-07 12:47:40",
                    "id_tenants": 2
                }
            ],
            "locations": [
                {
                    "id": 9,
                    "name": "Head Office Geprek Bensu",
                    "address": "Jl. YDPP I No.3, RT.6\/RW.6, Cipete Sel., Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12410",
                    "lat": "-6.27547680",
                    "lng": "106.81228790",
                    "created_at": "2019-12-07 12:47:39",
                    "updated_at": "2019-12-07 12:47:39",
                    "id_tenants": 2
                }
            ],
            "opening_hours": [
                {
                    "id": 57,
                    "day": "senin",
                    "open_time": "10:00 AM",
                    "close_time": "4:00 PM",
                    "created_at": "2019-12-07 12:47:40",
                    "updated_at": "2019-12-07 12:47:40",
                    "id_tenants": 2
                },
                {
                    "id": 58,
                    "day": "selasa",
                    "open_time": "10:00 AM",
                    "close_time": "4:00 PM",
                    "created_at": "2019-12-07 12:47:40",
                    "updated_at": "2019-12-07 12:47:40",
                    "id_tenants": 2
                },
                {
                    "id": 59,
                    "day": "rabu",
                    "open_time": "10:00 AM",
                    "close_time": "4:00 PM",
                    "created_at": "2019-12-07 12:47:40",
                    "updated_at": "2019-12-07 12:47:40",
                    "id_tenants": 2
                },
                {
                    "id": 60,
                    "day": "kamis",
                    "open_time": "10:00 AM",
                    "close_time": "4:00 PM",
                    "created_at": "2019-12-07 12:47:40",
                    "updated_at": "2019-12-07 12:47:40",
                    "id_tenants": 2
                },
                {
                    "id": 61,
                    "day": "jum'at",
                    "open_time": "10:00 AM",
                    "close_time": "4:00 PM",
                    "created_at": "2019-12-07 12:47:40",
                    "updated_at": "2019-12-07 12:47:40",
                    "id_tenants": 2
                },
                {
                    "id": 62,
                    "day": "sabtu",
                    "open_time": "-",
                    "close_time": "-",
                    "created_at": "2019-12-07 12:47:40",
                    "updated_at": "2019-12-07 12:47:40",
                    "id_tenants": 2
                },
                {
                    "id": 63,
                    "day": "minggu",
                    "open_time": "-",
                    "close_time": "-",
                    "created_at": "2019-12-07 12:47:40",
                    "updated_at": "2019-12-07 12:47:40",
                    "id_tenants": 2
                }
            ]
        }
    ],
    "message": "Tenants berhasil diselect"
}
```

### HTTP Request
`GET api/tenants`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `where` |  optional  | optional isi query string dengan 3 argumen, pisahkan dengan koma.  contoh: ?where=id,!=,1
    `orderBy` |  optional  | optional isi query string dengan 2 argumen, pisahkan dengan koma.  contoh: ?orderBy=id,DESC
    `limit` |  optional  | optional untuk membatasi banyak rows yang ditampilkan. contoh: ?limit=3.
    `offset` |  optional  | optional (hanya bisa dipakai jika menggunakan query limit). contoh: ?offset=2.

<!-- END_b8b23cad934e85cedb406add43c9c137 -->


