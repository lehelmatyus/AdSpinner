# AdSpinner

Simple PHP library to randomly rotate between ad images (or any linked images).  
Displays a new linked image on every page load.
It takes a JSON as an input and picks an image randomly from the onoes available   

<p>
    <img src="https://cdn-icons-png.flaticon.com/128/2000/2000519.png" height="25" width="25" style="vertical-align: middle;"/>
    <span style="vertical-align: middle;">Donate BitcoinCash</span>
</p>   

<b>BCH Cash</b>: qrt2r4mryq9xu3sgexq2x98m6aza3s6ug5wt3xd22z   
<b>BTC</b>: 1PyoztctiBQmonh8UTpvb6ArA1k3jVeWA6   


## How To add AdSpinner to your php project

Create a composer.json File: Run the following command to initialize a new composer.json file if you don't already have one.
```
composer init
```

Add AdSpinner as a dependency
```
composer require lehelmatyus/adspinner
```

Verify Composer Installation
```
composer install
```


## Usage example

 ```
// Example usage:
$ads_json = '{
    "ads": [
        {
            "link": "https://example.com/ad1",
            "image": "https://example.com/ad1.jpg",
            "alt": "Ad 1",
            "width": 300,
            "height": 250
        },
        {
            "link": "https://example.com/ad2",
            "image": "https://example.com/ad2.jpg",
            "alt": "Ad 2",
            "width": 728,
            "height": 90
        },
        {
            "link": "https://example.com/ad3",
            "image": "https://example.com/ad3.jpg",
            "alt": "Ad 3",
            "width": 160,
            "height": 600
        }
    ]
}';

```

```
$ad_spinner = new AdSpinner($ads_json);
echo $ad_spinner->spin();
```