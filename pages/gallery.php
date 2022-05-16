<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UPI Dimensional Drift</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" />
    <link rel="stylesheet" href="/public/css/app.css" />
    <link rel="icon" type="image/png" href="/public/images/logo/logo.png" />
</head>

<body class="">
    <div class="modal-wrapper z-10 h-screen fixed bg-black/70 w-screen hidden" id="modal">
        <div class="fixed sm:w-[600px] w-[400px] h-[600px] max-h-400 bg-white z-20 top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 rounded-xl">
            <div class="flex flex-col relative overflow-y-scroll overflow-x-hidden w-full h-full p-5 gap-y-3">
                <button type="button" class="text-2xl self-end px-2 py-1 rounded-lg hover:bg-gray-100" id="btn-close-modal">
                    &times;
                </button>
                <img src="/public/images/gallery/gdbiru.jpg" alt="" class="aspect-ratio-1/1 w-auto h-[400px] object-cover rounded-xl" id="img-modal" />
                <div class="desc text-center px-5 py-9">
                    <h1 class="text-2xl font-semibold" id="modal-title">
                        Title
                    </h1>
                    <p id="modal-desc">
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Natus modi sint eligendi obcaecati, recusandae
                        placeat voluptatum commodi expedita reiciendis
                        deleniti ducimus quo, ex asperiores a?
                    </p>
                </div>
            </div>
        </div>
    </div>
    <header class="bg-transparant text-white absolute top-0 left-0 w-full flex z-50 lg:px-10 py-3">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="/" class="flex gap-x-3 items-center justify-center">
                        <svg class="w-auto h-10" viewBox="0 0 482 481" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M319.361 32.6983L382.064 95.407C383.332 97.6714 384.531 100.005 385.698 102.333C385.703 102.385 385.728 102.433 385.767 102.466C385.799 102.498 385.799 102.498 385.799 102.568C399.659 130.477 406.763 161.254 406.537 192.414C406.311 223.575 398.762 254.245 384.499 281.951C382.064 286.65 379.464 291.248 376.63 295.75C376.606 295.809 376.573 295.864 376.534 295.915C368.553 308.645 359.159 320.432 348.531 331.052L347.098 332.485C362.931 314.113 373.748 291.962 378.502 268.179C383.256 244.397 381.786 219.789 374.232 196.743L374.201 196.711C367.867 177.31 357.384 159.523 343.48 144.584C329.577 129.644 312.587 117.912 293.692 110.202C289.525 107.501 285.258 104.965 280.905 102.632C279.104 101.635 277.175 100.666 275.337 99.7333C274.202 99.1312 273.035 98.5665 271.901 98.0337C270.537 97.3997 269.167 96.7017 267.734 96.1316C266.77 95.7001 265.768 95.2312 264.735 94.7997C262.87 94.0005 260.936 93.2013 259.002 92.3968C256.834 91.5657 254.702 90.6972 252.502 89.9673C251.298 89.5677 250.168 89.1628 248.932 88.8005C247.835 88.3636 246.599 87.996 245.432 87.6337C244.265 87.2714 242.997 86.8665 241.734 86.5309C239.934 85.9342 238.101 85.4973 236.3 85.0337C233.833 84.3624 231.335 83.7977 228.868 83.1956C228.735 83.2649 228.697 83.2329 228.564 83.1637C225.996 82.5989 223.396 82.0661 220.833 81.6985C218.265 81.1977 215.633 80.7661 212.996 80.4625C210.359 80.1588 207.796 79.7325 205.132 79.5301C204.952 79.5557 204.768 79.5338 204.599 79.4662C202.17 79.2317 199.767 79.0293 197.3 78.9653C194.668 78.8002 192.1 78.6989 189.436 78.6989C186.799 78.5977 184.199 78.5977 181.498 78.6989C179.068 78.7309 176.564 78.8321 174.039 79.0293H173.645C172.345 79.1305 171.007 79.1998 169.745 79.333C168.375 79.4289 167.043 79.5674 165.743 79.7325C163.175 79.967 160.512 80.2973 157.906 80.6969C156.542 80.8674 155.173 81.0325 153.841 81.2989C152.509 81.5653 151.14 81.7998 149.808 81.9969C149.243 82.0981 148.71 82.2313 148.14 82.3325C145.743 82.7961 143.276 83.3342 140.841 83.8989C138.007 84.5329 135.204 85.2628 132.407 86.0673C131.304 86.3657 130.239 86.6321 129.173 87.0317C128.07 87.33 127.074 87.6657 125.976 88.0333C124.924 88.3173 123.889 88.6625 122.876 89.0669C120.51 89.8341 118.113 90.6972 115.742 91.5976C115.044 91.8321 114.309 92.0985 113.611 92.3968C111.911 93.0308 110.275 93.798 108.576 94.528C108.237 94.6292 107.913 94.7741 107.611 94.9595C106.407 95.423 105.241 95.9238 104.074 96.4939C102.907 97.064 101.879 97.4902 100.744 98.0923L100.653 98.0869H100.584C99.4865 98.5878 98.3889 99.1525 97.2541 99.7546C95.3521 100.655 93.5246 101.689 91.6865 102.658L161.593 32.7516C171.942 22.3731 184.236 14.1381 197.772 8.5181C211.307 2.89809 225.819 0.00346743 240.475 3.11326e-06C255.131 -0.00346121 269.644 2.88433 283.182 8.49796C296.72 14.1116 309.019 22.3408 319.372 32.7142L319.361 32.6983Z" fill="#0047BB" />
                            <path d="M382.063 95.4225L448.272 161.626C458.655 171.977 466.894 184.275 472.515 197.816C478.137 211.356 481.03 225.873 481.03 240.534C481.03 255.195 478.137 269.712 472.515 283.253C466.894 296.793 458.655 309.092 448.272 319.442L364.129 403.579C361.396 404.448 358.631 405.279 355.829 406.014L355.797 406.046C355.727 406.046 355.727 406.046 355.695 406.083C347.997 408.145 340.183 409.746 332.296 410.878C290.101 417.015 247.052 409.367 209.553 389.072C201.094 384.524 192.993 379.343 185.316 373.573L185.247 373.504C181.614 370.808 178.012 367.941 174.549 364.937C201.164 379.035 231.598 384.228 261.382 379.752C291.166 375.277 318.73 361.369 340.026 340.071C342.53 337.567 344.896 335.069 347.096 332.469L348.529 331.035C359.157 320.415 368.551 308.628 376.533 295.898C376.571 295.848 376.604 295.792 376.628 295.733C379.463 291.231 382.063 286.633 384.498 281.934C398.76 254.229 406.309 223.558 406.535 192.398C406.761 161.237 399.657 130.46 385.798 102.551C385.798 102.482 385.798 102.482 385.766 102.45C385.726 102.416 385.701 102.368 385.696 102.317C384.53 100.004 383.331 97.6708 382.063 95.4225Z" fill="#0072CE" />
                            <path d="M364.131 403.564L319.377 448.318C298.45 469.244 270.067 481 240.471 481C210.876 481 182.493 469.244 161.566 448.318L93.6256 380.377C91.5264 375.614 89.5924 370.744 87.8928 365.843V365.709C86.9604 363.045 86.092 360.382 85.3248 357.675C84.824 356.045 84.3605 354.377 83.8596 352.741C83.0605 349.545 82.2613 346.407 81.59 343.21C80.924 340.141 80.29 337.11 79.7572 333.977C79.2244 330.844 78.8248 327.706 78.4252 324.573C78.0257 321.44 77.7593 318.308 77.5248 315.207C77.2904 312.106 77.1252 308.941 77.056 305.739C76.9867 302.537 76.9601 299.436 77.056 296.272C77.1892 290.006 77.6261 283.703 78.356 277.438C79.0593 271.268 80.0929 265.184 81.3556 259.099C81.3897 258.941 81.436 258.787 81.4941 258.636C82.1228 255.604 82.89 252.567 83.6252 249.578C83.6987 249.434 83.744 249.276 83.7584 249.115L84.9572 244.911C86.0227 241.31 87.1576 237.777 88.4256 234.256C88.9903 232.556 89.6563 230.888 90.2903 229.189C91.0948 227.122 91.926 225.022 92.7944 223.019C93.6256 221.123 94.494 219.188 95.3571 217.254L95.3944 217.153C95.9592 215.986 96.5239 214.756 97.094 213.589C97.9251 211.953 98.7936 210.222 99.694 208.586C100.255 207.377 100.877 206.198 101.559 205.054C103.125 202.219 104.755 199.385 106.492 196.652C106.475 196.93 106.441 197.208 106.391 197.483C101.305 213.458 99.093 230.209 99.8591 246.957C100.98 271.42 108.455 295.168 121.55 315.862C134.645 336.555 152.906 353.478 174.534 364.963C177.997 367.968 181.599 370.824 185.232 373.531L185.302 373.6C192.978 379.37 201.08 384.551 209.538 389.099C247.037 409.394 290.086 417.042 332.281 410.905C340.169 409.773 347.983 408.172 355.681 406.11C355.713 406.073 355.713 406.073 355.782 406.073L355.814 406.041C358.632 405.263 361.397 404.437 364.131 403.564Z" fill="url(#paint0_linear_159_3)" />
                            <path d="M293.221 109.909C289.225 107.309 285.091 104.843 280.924 102.605C279.555 101.838 278.058 101.071 276.625 100.373C276.023 100.042 275.591 99.8078 275.357 99.7066C274.222 99.1046 273.055 98.5398 271.92 98.007C270.556 97.373 269.187 96.6751 267.754 96.105C266.79 95.6734 265.788 95.2046 264.754 94.773C262.89 93.9738 260.956 93.1747 259.022 92.3702C256.853 91.539 254.685 90.7079 252.522 89.9407C251.318 89.5411 250.188 89.1362 248.952 88.7739C247.822 88.3743 246.618 87.9694 245.452 87.6071C244.285 87.2448 243.017 86.8399 241.754 86.5042C239.953 85.9075 238.121 85.4706 236.32 85.0071C233.853 84.3358 231.354 83.771 228.887 83.169C228.754 83.2383 228.717 83.2063 228.584 83.137C225.984 82.6042 223.416 82.1034 220.853 81.6719C218.29 81.2403 215.653 80.8034 213.016 80.4358C210.378 80.0682 207.816 79.7698 205.152 79.5034C204.972 79.5295 204.788 79.5072 204.619 79.4395C202.152 79.237 199.755 79.0399 197.32 78.9387C194.656 78.8055 192.088 78.7043 189.456 78.6723C186.824 78.6403 184.219 78.5711 181.518 78.6723C179.088 78.7043 176.584 78.8055 174.059 79.0026H173.643C172.343 79.1038 171.006 79.1731 169.743 79.3063L165.742 79.7059C163.174 79.9403 160.51 80.2706 157.905 80.6702C156.573 80.8727 155.209 81.1071 153.839 81.2723C152.47 81.4374 151.138 81.7731 149.806 81.9702C149.242 82.0715 148.709 82.2047 148.139 82.3059C145.741 82.7694 143.274 83.3075 140.84 83.8723C138.005 84.5063 135.203 85.2362 132.406 86.0407C131.303 86.3391 130.237 86.6054 129.172 87.005C128.069 87.3034 127.072 87.639 125.975 88.0067C124.923 88.2912 123.887 88.6364 122.874 89.0403C120.508 89.8075 118.143 90.6386 115.74 91.571C115.042 91.8054 114.307 92.0718 113.609 92.3702C111.877 93.0415 110.21 93.7075 108.574 94.5013C108.236 94.6025 107.911 94.748 107.61 94.9329C106.406 95.3964 105.239 95.8972 104.072 96.4673C102.905 97.0374 101.877 97.4636 100.742 98.0656L100.652 98.0869H100.582C99.4848 98.5878 98.3873 99.1525 97.2525 99.7545C95.3504 100.655 93.523 101.689 91.6849 102.658L32.7113 161.627L32.6793 161.659C22.3189 172.015 14.1005 184.311 8.49325 197.844C2.88608 211.378 0 225.883 0 240.532C0 255.181 2.88608 269.687 8.49325 283.22C14.1005 296.753 22.3189 309.049 32.6793 319.405L93.6508 380.377C91.5197 375.513 89.5857 370.579 87.8861 365.608C85.8509 359.78 84.1566 353.887 82.6862 347.941C82.2812 346.407 81.9509 344.809 81.6206 343.21C80.9546 340.141 80.3206 337.11 79.7878 333.977C79.255 330.844 78.7862 327.775 78.4559 324.573C78.0563 321.51 77.7206 318.372 77.5555 315.207C77.3903 312.042 77.1239 308.904 77.0866 305.739C76.9534 302.607 76.9534 299.405 77.0866 296.272C77.2198 290.006 77.6194 283.672 78.3866 277.438C79.0851 271.311 80.0984 265.224 81.4235 259.201C81.4363 259.01 81.4704 258.82 81.5247 258.636C82.1214 255.7 82.7874 252.834 83.5546 249.936C86.023 240.754 89.1201 231.754 92.825 222.998C93.6562 221.101 94.5246 219.167 95.3877 217.233L95.425 217.132C95.9898 215.965 96.5545 214.735 97.1246 213.568C97.245 213.389 97.3452 213.198 97.423 212.998C98.1582 211.463 98.9574 209.998 99.7246 208.565C100.286 207.357 100.908 206.178 101.589 205.033C103.156 202.198 104.786 199.364 106.523 196.631C106.459 196.897 106.491 197.195 106.422 197.462C106.592 196.897 106.789 196.434 106.923 195.895L107.024 195.8C113.867 175.114 125.48 156.328 140.925 140.96C166.078 115.749 199.875 101.043 235.467 99.8238C235.635 99.7972 235.806 99.8084 235.968 99.8558C246.996 99.4876 258.029 100.429 268.836 102.658H268.905C270.77 103.058 272.634 103.457 274.504 103.921C281.04 105.55 287.45 107.645 293.685 110.192C293.525 110.107 293.37 110.013 293.221 109.909Z" fill="url(#paint1_linear_159_3)" />
                            <g style="mix-blend-mode: multiply" opacity="0.08">
                                <g style="mix-blend-mode: multiply" opacity="0.08">
                                    <path d="M322.391 35.7505L382.063 95.4221C402.792 133.017 410.731 176.334 404.682 218.837C398.633 261.34 378.924 300.722 348.529 331.04L347.096 332.474C362.929 314.102 373.746 291.951 378.5 268.168C383.254 244.385 381.784 219.778 374.231 196.731C374.231 196.662 374.199 196.699 374.199 196.699C371.162 152.307 357.027 98.5069 322.391 35.7505Z" fill="white" />
                                </g>
                            </g>
                            <g style="mix-blend-mode: multiply" opacity="0.08">
                                <g style="mix-blend-mode: multiply" opacity="0.08">
                                    <path d="M402.964 364.73L364.129 403.564C331.862 413.866 297.492 415.724 264.302 408.96C231.112 402.195 200.211 387.035 174.549 364.927C196.234 376.424 220.554 382.035 245.084 381.198C298.234 390.01 352.777 384.321 402.964 364.73Z" fill="white" />
                                </g>
                            </g>
                            <g style="mix-blend-mode: multiply" opacity="0.08">
                                <g style="mix-blend-mode: multiply" opacity="0.08">
                                    <path d="M106.513 196.615C106.496 196.894 106.462 197.172 106.412 197.447C101.326 213.422 99.114 230.173 99.8801 246.921C97.115 285.888 100.178 340.894 122.113 408.834L93.6466 380.362C90.3779 372.987 87.6048 365.404 85.3458 357.66C84.845 356.03 84.3814 354.362 83.8806 352.727C83.0815 349.53 82.2823 346.392 81.611 343.195C80.945 340.126 80.311 337.095 79.7782 333.962C79.2454 330.829 78.8458 327.691 78.4462 324.558C78.0466 321.426 77.7803 318.292 77.5458 315.192C77.3114 312.091 77.1462 308.927 77.077 305.725C77.0077 302.522 76.9811 299.422 77.077 296.257C77.2102 289.991 77.6471 283.689 78.377 277.423C79.0802 271.253 80.1138 265.169 81.3765 259.085C81.4106 258.926 81.457 258.771 81.5151 258.621C82.1438 255.589 82.911 252.553 83.6462 249.564C83.7197 249.419 83.765 249.262 83.7794 249.1L84.9782 244.896C86.0437 241.294 87.1786 237.762 88.4466 234.24C89.0113 232.541 89.6773 230.874 90.3113 229.174C91.1158 227.107 91.947 225.008 92.8154 223.005C94.1793 219.84 95.6125 216.669 97.115 213.574C97.9461 211.938 98.8146 210.207 99.715 208.571C100.276 207.362 100.898 206.183 101.58 205.039C103.141 202.183 104.776 199.348 106.513 196.615Z" fill="white" />
                                </g>
                            </g>
                            <g style="mix-blend-mode: multiply" opacity="0.08">
                                <g style="mix-blend-mode: multiply" opacity="0.08">
                                    <path d="M293.69 110.175C287.455 107.629 281.046 105.533 274.51 103.905C272.706 103.243 270.824 102.819 268.91 102.642H268.841C258.035 100.412 247.002 99.4713 235.974 99.8395C235.811 99.792 235.64 99.7814 235.473 99.8075C190.639 98.6407 121.367 109.308 32.7222 161.611L91.6963 102.642C93.5291 101.672 95.3618 100.639 97.2639 99.7382C98.3987 99.1415 99.4962 98.5714 100.594 98.0706C100.631 98.0386 100.727 98.0706 100.764 98.0387C101.899 97.4366 102.997 96.9411 104.094 96.4403C105.192 95.9395 106.428 95.3753 107.632 94.9064C107.933 94.721 108.257 94.5761 108.596 94.4749C110.232 93.7076 111.899 93.0411 113.63 92.3432C114.328 92.0448 115.064 91.779 115.762 91.5445C118.165 90.6122 120.53 89.7805 122.896 89.0133C123.908 88.6094 124.944 88.2642 125.996 87.9797C127.099 87.6121 128.096 87.2764 129.193 86.9781C130.259 86.5785 131.324 86.3121 132.427 86.0137C135.224 85.2092 138.027 84.4793 140.862 83.8453C143.296 83.2805 145.763 82.743 148.16 82.2794C148.73 82.1782 149.263 82.045 149.828 81.9438C151.16 81.7467 152.492 81.4803 153.861 81.2458C155.231 81.0114 156.595 80.8457 157.927 80.6433C160.532 80.2437 163.195 79.9133 165.763 79.6789L169.765 79.2799C171.028 79.1467 172.365 79.0769 173.665 78.9756H174.064C176.595 78.7785 179.099 78.6773 181.524 78.6453C184.225 78.5441 186.851 78.5441 189.462 78.6453C192.072 78.7465 194.662 78.779 197.325 78.9122C199.76 79.0135 202.158 79.2101 204.625 79.4125C204.794 79.4807 204.977 79.5026 205.157 79.477C207.821 79.7434 210.421 80.079 213.021 80.4094C215.621 80.7397 218.259 81.1766 220.859 81.6454C223.459 82.1143 225.99 82.5773 228.59 83.11C228.723 83.1793 228.76 83.2118 228.893 83.1425C231.36 83.7446 233.858 84.3088 236.326 84.9801C238.127 85.4436 239.959 85.8811 241.76 86.4778C243.023 86.8134 244.227 87.213 245.458 87.5806C246.688 87.9483 247.829 88.3473 248.958 88.7469C250.194 89.1092 251.323 89.5146 252.528 89.9142C254.69 90.6814 256.859 91.512 259.028 92.3432C260.962 93.1477 262.895 93.9421 264.76 94.7466C265.793 95.1781 266.795 95.647 267.759 96.0785C269.193 96.6486 270.562 97.346 271.926 97.98C273.061 98.5128 274.227 99.0776 275.362 99.6796C275.597 99.7808 276.029 100.015 276.631 100.346L280.53 102.578C285.096 105.216 291.229 108.748 293.227 109.883C293.375 109.99 293.53 110.088 293.69 110.175Z" fill="white" />
                                </g>
                            </g>
                            <g style="mix-blend-mode: multiply" opacity="0.25">
                                <g style="mix-blend-mode: multiply" opacity="0.25">
                                    <path d="M355.794 406.036C355.725 406.036 355.725 406.036 355.693 406.073C347.995 408.135 340.181 409.736 332.293 410.868C290.098 417.005 247.049 409.357 209.55 389.061C201.092 384.514 192.99 379.333 185.314 373.563C185.815 373.797 188.18 375.161 192.048 377.228C196.348 379.594 202.581 382.828 210.115 386.286C213.983 387.953 218.048 389.818 222.449 391.555C224.649 392.487 226.951 393.318 229.316 394.155C231.682 394.991 233.984 395.886 236.45 396.686C241.352 398.385 246.483 399.786 251.683 401.188C256.883 402.589 262.285 403.788 267.666 404.752C273.037 405.855 278.471 406.686 283.836 407.32C289.201 407.954 294.492 408.455 299.67 408.689C304.849 408.924 309.793 409.121 314.54 409.089C319.288 409.057 323.672 408.956 327.94 408.689C332.208 408.423 335.873 408.22 339.342 407.89C342.81 407.56 345.676 407.219 348.143 406.952C352.693 406.398 355.458 406.036 355.794 406.036Z" fill="white" />
                                </g>
                            </g>
                            <g style="mix-blend-mode: multiply" opacity="0.25">
                                <g style="mix-blend-mode: multiply" opacity="0.25">
                                    <path d="M385.797 102.541C399.656 130.45 406.76 161.228 406.534 192.388C406.308 223.548 398.759 254.219 384.497 281.924C382.062 286.624 379.462 291.221 376.627 295.723C376.862 295.02 378.061 292.223 380.032 287.854C381.066 285.355 382.797 282.223 383.996 278.824C385.296 275.19 387.193 271.12 388.562 266.719C389.297 264.518 390.064 262.222 390.895 259.851C391.599 257.422 392.297 254.918 393.064 252.355C393.89 249.748 394.58 247.1 395.131 244.422C395.733 241.683 396.532 238.95 397.065 236.084C397.598 233.217 398.163 230.319 398.701 227.383C399.239 224.448 399.5 221.448 399.963 218.449C400.427 215.449 400.699 212.385 400.965 209.317C401.231 206.248 401.567 203.184 401.53 200.083C401.631 196.983 401.897 193.914 401.897 190.845C401.897 187.776 401.796 184.681 401.764 181.649C401.301 175.581 401.231 169.582 400.4 163.812C399.899 158.047 398.834 152.511 398.067 147.21C397.534 144.61 396.964 142.042 396.468 139.612C396.061 137.208 395.528 134.826 394.87 132.479C393.671 127.945 392.67 123.741 391.503 120.107C390.336 116.474 389.505 113.181 388.471 110.608C386.963 106.308 386.063 103.415 385.797 102.541Z" fill="white" />
                                </g>
                            </g>
                            <g style="mix-blend-mode: multiply" opacity="0.25">
                                <g style="mix-blend-mode: multiply" opacity="0.25">
                                    <path d="M95.3732 217.217L92.4429 227.873C91.3773 231.405 90.5728 235.007 89.6724 238.577C88.772 242.146 88.0421 245.743 87.2429 249.275L86.9392 250.644L86.7421 251.843L86.2413 254.608L85.7724 257.341L85.5433 258.71L85.4421 259.345C85.4501 259.286 85.4389 259.226 85.4101 259.174L85.3728 259.808L83.6093 273.245L83.1405 276.575L82.9753 277.411L82.9433 277.71L82.906 277.742L82.9433 277.779V277.843L82.906 278.013L82.8101 279.51L82.4425 286.277C82.3093 288.546 82.2081 290.779 81.9737 293.011L81.7392 296.378L81.6753 299.447L81.6433 306.011C81.7392 308.249 81.7392 310.513 81.7765 312.745L81.8085 314.445V314.845L81.7765 314.882L81.8085 314.978L81.7765 315.079L81.8724 315.916L82.0749 319.315L82.272 322.65L82.3413 324.179L82.4745 325.847L83.0392 332.613L83.8384 339.15L84.206 342.517L84.6749 345.783C84.8081 347.781 85.4101 350.184 85.7724 352.353C86.5769 356.748 87.3068 361.218 87.9036 365.672C86.9712 363.008 86.1027 360.344 85.3355 357.638C84.8347 356.008 84.3712 354.34 83.8704 352.704C83.0712 349.508 82.272 346.369 81.6007 343.173C80.9347 340.104 80.3007 337.072 79.7679 333.94C79.2352 330.807 78.8356 327.669 78.436 324.536C78.0364 321.403 77.77 318.27 77.5356 315.17C77.3012 312.069 77.136 308.904 77.0667 305.702C76.9975 302.5 76.9708 299.399 77.0667 296.234C77.1999 289.969 77.6368 283.666 78.3667 277.401C79.07 271.231 80.1036 265.147 81.3663 259.062C81.4004 258.904 81.4467 258.749 81.5048 258.599C82.1335 255.567 82.9007 252.53 83.636 249.541C83.7095 249.397 83.7548 249.239 83.7692 249.078L84.9679 244.874C86.0335 241.272 87.1683 237.74 88.4363 234.218C89.0011 232.519 89.6671 230.851 90.3011 229.152C91.1056 227.084 91.9367 224.985 92.8052 222.982C93.6416 221.085 94.5101 219.151 95.3732 217.217Z" fill="white" />
                                </g>
                            </g>
                            <g style="mix-blend-mode: multiply" opacity="0.25">
                                <g style="mix-blend-mode: multiply" opacity="0.25">
                                    <path d="M264.747 94.7725C261.646 93.936 258.679 93.1049 255.578 92.3377L253.282 91.7729C252.445 91.5385 251.88 91.3733 251.044 91.2028L246.445 90.1373L241.912 89.1356L237.245 88.2033L228.88 86.6369H228.742C228.484 86.6369 228.228 86.6044 227.979 86.541C227.951 86.5175 227.915 86.5042 227.878 86.5037L227.846 86.4717L222.108 85.7365C221.112 85.6033 220.211 85.4381 219.21 85.3742L216.274 85.0385L213.312 84.6709L212.044 84.5377L210.541 84.3725L205.144 83.9037H205.011C204.877 83.8872 204.741 83.8872 204.606 83.9037C204.409 83.9037 204.244 83.8717 203.94 83.8397C201.543 83.7705 199.145 83.5734 196.844 83.4721L189.342 83.307L181.675 83.3709L174.275 83.6373H174.072L174.041 83.6053L174.009 83.6373C172.171 83.7385 170.338 83.8397 168.441 84.0049L165.74 84.3033L162.937 84.5697L157.338 85.1024L154.535 85.4381L151.839 85.8057C150.869 85.9709 150.103 86.0721 149.106 86.2692L146.469 86.7061L143.672 87.1697L142.271 87.3721C142.086 87.4265 141.897 87.46 141.706 87.4733L141.002 87.6385L135.435 88.736L130.107 89.8709L129.974 89.9401C128.274 90.3024 126.575 90.67 124.806 91.1709L119.505 92.5401L114.241 93.936L109.009 95.5344L108.838 95.5663L108.071 95.8007L107.975 95.8327C105.642 96.568 103.138 97.2659 100.74 98.0651C101.875 97.463 102.973 96.9675 104.07 96.4667C105.168 95.9659 106.404 95.4012 107.608 94.9323C107.909 94.7474 108.233 94.6025 108.572 94.5008C110.208 93.7335 111.875 93.0676 113.606 92.3696C114.304 92.0713 115.04 91.8049 115.738 91.5704C118.141 90.6381 120.506 89.8069 122.872 89.0397C123.884 88.6359 124.92 88.2906 125.972 88.0061C127.075 87.6385 128.072 87.3028 129.17 87.0045C130.235 86.6049 131.3 86.3385 132.403 86.0402C135.2 85.2356 138.003 84.5057 140.838 83.8717C143.272 83.307 145.739 82.7689 148.137 82.3053C148.707 82.2041 149.24 82.0709 149.804 81.9697C151.136 81.7725 152.468 81.5062 153.837 81.2717C155.206 81.0373 156.57 80.8721 157.902 80.6697C160.507 80.2701 163.172 79.9398 165.74 79.7053L169.741 79.3058C171.003 79.1726 172.341 79.1033 173.641 79.0021H174.041C176.571 78.8049 179.075 78.7037 181.499 78.6717C184.2 78.5705 186.827 78.5705 189.438 78.6717C192.049 78.773 194.638 78.8049 197.301 78.9381C199.736 79.0394 202.134 79.2365 204.601 79.439C204.769 79.5072 204.953 79.529 205.134 79.5029C207.798 79.7693 210.397 80.1049 212.997 80.4353C215.597 80.7656 218.235 81.2025 220.835 81.6713C223.435 82.1402 225.965 82.6037 228.565 83.1365C228.698 83.2057 228.736 83.2377 228.869 83.1684C231.336 83.7705 233.835 84.3352 236.302 85.0065C238.103 85.4701 239.935 85.907 241.736 86.5037C242.998 86.8393 244.202 87.2389 245.433 87.6065C246.664 87.9741 247.805 88.3737 248.934 88.7733C250.17 89.1356 251.3 89.5405 252.504 89.9401C254.667 90.7073 256.835 91.5385 259.004 92.3696C260.954 93.1741 262.887 93.9733 264.747 94.7725Z" fill="white" />
                                </g>
                            </g>
                            <g style="mix-blend-mode: screen" opacity="0.4">
                                <g style="mix-blend-mode: screen" opacity="0.4">
                                    <path d="M82.9027 278.024C82.8708 277.923 82.94 277.853 82.9027 277.821L82.94 277.853L82.9027 278.024Z" fill="white" />
                                </g>
                            </g>
                            <g style="mix-blend-mode: screen" opacity="0.4">
                                <g style="mix-blend-mode: screen" opacity="0.4">
                                    <path d="M202.348 83.2383L204.282 83.8403H203.946C203.383 83.7354 202.842 83.5313 202.348 83.2383Z" fill="white" />
                                </g>
                            </g>
                            <g style="mix-blend-mode: screen" opacity="0.4">
                                <g style="mix-blend-mode: screen" opacity="0.4">
                                    <path d="M227.047 86.2051L227.515 86.4023C227.354 86.35 227.197 86.284 227.047 86.2051Z" fill="white" />
                                </g>
                            </g>
                            <g style="mix-blend-mode: screen" opacity="0.4">
                                <g style="mix-blend-mode: screen" opacity="0.4">
                                    <path d="M228.021 86.5042L230.418 86.2378C230.189 86.363 229.943 86.453 229.688 86.5042C229.431 86.5926 229.161 86.6379 228.889 86.6374H228.75L228.021 86.5042Z" fill="white" />
                                </g>
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_159_3" x1="1443.76" y1="1492.14" x2="1443.76" y2="1794.12" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#00A3E1" />
                                    <stop offset="0.247" stop-color="#355881" />
                                    <stop offset="0.75" stop-color="#1F324E" />
                                    <stop offset="1" stop-color="#131D32" />
                                </linearGradient>
                                <linearGradient id="paint1_linear_159_3" x1="1681.05" y1="1492.05" x2="1372.68" y2="1492.05" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0B1F41" />
                                    <stop offset="1" stop-color="#131D32" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <span class="font-semibold">Upi <br />
                            Dimensional Drift</span>
                    </a>
                </div>
                <div class="flex items-center px-4">
                    <button id="humberger" type="button" name="button" class="block absolute right-4 lg:hidden">
                        <i class="bx bx-menu text-4xl"></i>
                    </button>
                    <nav id="nav" class="hidden py-5 absolute lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full">
                        <ul class="block sm:flex font-semibold">
                            <li class="group">
                                <a href="index.php" class="py-2 mx-8 flex group-hover:text-color2">Home</a>
                            </li>
                            <li class="group">
                                <a href="about.php" class="py-2 mx-8 flex group-hover:text-color2">About</a>
                            </li>
                            <li class="group">
                                <a href="room-tour.php" class="py-2 mx-8 flex group-hover:text-color2">Room Tour</a>
                            </li>
                            <li class="group">
                                <a href="gallery.php" class="py-2 mx-8 flex group-hover:text-color2">Gallery</a>
                            </li>
                            <li class="flex mx-8 text-center group">
                                <a href="login.php" class="w-full outline outline-1 outline-color1 shadow-lg py-3 rounded-lg group-hover:bg-color1 group-hover:text-white group-hover:outline-none lg:px-10">
                                    Login</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section id="header" class="bg-fixed bg-[url('/public/images/gallery/bghome.jpeg')] bg-cover overflow-hidden -z-10">
        <div class="flex h-screen items-center justify-center w-screen">
            <div class="font-bold text-white text-center text-2xl sm:text-6xl">
                <h1>Gallery UPI</h1>
                <h1>Dimensional Drift</h1>
            </div>
        </div>
    </section>
    <section id="gallery" class="h-full px-2 sm:px-10 py-10 bg-color1">
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gdbiru.jpg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
            <div class="relative group gallery">
                <div class="h-[200px] aspect-[1/1] w-full rounded-xl overflow-hidden group-hover:brightness-50 transition-all duration-150">
                    <img src="/public/images/gallery/gedung kantor.jpeg" alt="" class="object-cover h-full w-full" />
                </div>
                <button class="py-2 px-3 bg-color1 text-white rounded-lg absolute hidden top-1/2 left-1/2 z-20 -translate-x-2/4 -translate-y-2/4 btn-detail transition-all duration-150">
                    Detail
                </button>
                <div class="hidden desc">
                    <h1>Title</h1>
                    <p>
                        Desc => Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Expedita modi praesentium
                        distinctio a quod consequuntur dolore non ad,
                        dolorum molestiae rem corrupti aliquid iste sunt.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer" class="text-white tracking-wide">
        <div class="flex bg-white p-10 flex-wrap sm:flex-nowrap gap-y-10 text-black">
            <div class="sm:order-1 order-2 sm:basis-1/2 flex gap-y-2 flex-col">
                <h1 class="font-bold text-2xl sm:text-4xl">
                    UPI <br />
                    Dimensional Drift
                </h1>
                <p class="font-light">
                    Web virtual tour that has the purpose and benefits to
                    provide users with the experience of entering the
                    virtual world dimension of the UPI Cibiru campus with a
                    sensation like being in an actual and real campus
                    environment
                </p>
                <p class="mt-6">
                    &copy; 2022 Sekolah Suzuran. All right reserved
                </p>
            </div>
            <div class="sm:order-2 order-1 sm:basis-1/2 flex flex-col items-end">
                <ul class="flex sm:justify-between flex-col sm:flex-row gap-y-4 sm:gap-x-10 py-3 font-semibold">
                    <li>Home</li>
                    <li>About</li>
                    <li>Room Tour</li>
                    <li>Gallery</li>
                </ul>
                <div class="flex text-2xl gap-x-2">
                    <a href="" class="">
                        <i class="bx bxl-twitter"></i>
                    </a>
                    <a href="">
                        <i class="bx bxl-instagram"></i>
                    </a>
                    <a href="">
                        <i class="bx bxl-facebook-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="/public/vendor/jquery/jquery.min.js"></script>
    <script src="/public/js/script.js"></script>
</body>

</html>