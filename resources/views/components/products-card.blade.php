<div {{ $attributes->merge(['class' => 'bg-white rounded shadow-sm px-5']) }} x-data="productList">
    <div class="py-2 flex items-center gap-4 border-b border-slate-200">
        {{-- thumbs up svg --}}
        <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="size-7">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path
                    d="M39.7928 8C37.3152 8 36.3732 9.98312 36.565 13.825C36.6923 16.3576 37.5453 23.4183 33.9708 26.9962C30.6371 30.3316 29.6675 30.0353 25.8689 34.3423C22.0719 38.6477 18.907 37.7621 14.4764 37.3814C8.91051 36.9041 10.8067 67.8051 14.7295 67.2694C17.514 66.8887 23.8439 66.129 24.8564 66.129C25.8689 66.129 32.8125 71.5104 38.9076 71.5749C48.7799 71.6777 54.2245 69.9279 54.2245 69.9279L57.1179 63.3615L58.086 43.34L53.4636 33.7084C53.4636 33.7084 47.2611 34.7214 45.4891 31.9355C43.7172 29.1497 46.8821 25.7299 46.8821 17.7513C46.8821 9.77283 41.0585 8 39.7928 8Z"
                    fill="url(#paint0_linear)"></path>
                <path
                    d="M54.5697 69.8692L54.1939 68.4985C53.0816 68.3803 51.6503 68.8869 49.6958 68.8715C40.3605 68.7994 31.4363 66.1179 27.6071 63.0849C25.0988 61.0987 23.9988 58.4556 22.2269 59.2154C20.0407 60.1532 13.8382 61.6114 11.5569 58.7227C12.1951 63.6651 13.3334 67.4594 14.7295 67.2691C17.514 66.8884 23.8439 66.1286 24.8564 66.1286C25.8689 66.1286 32.6192 71.3688 38.9076 71.5745C47.0432 71.84 54.269 70.4386 54.269 70.4386L54.5697 69.8692Z"
                    fill="url(#paint1_linear)"></path>
                <path
                    d="M18.4298 39.3324C22.101 40.3454 24.4329 38.6693 26.3092 36.3884C28.1732 34.1229 29.7901 32.1136 34.4739 29.0745C39.1576 26.0353 38.5562 17.6762 38.1758 14.8903C37.7953 12.1044 38.0484 8 39.7928 8C37.3151 8 36.3732 9.98312 36.5649 13.825C36.6923 16.3577 37.5452 23.4183 33.9707 26.9962C30.637 30.3316 29.6674 30.0353 25.8689 34.3423C22.0719 38.6478 18.9069 37.7621 14.4763 37.3815C14.4779 38.3424 14.7586 38.3193 18.4298 39.3324Z"
                    fill="url(#paint2_linear)"></path>
                <path
                    d="M45.4891 31.9356C43.7172 29.1497 46.8821 25.7299 46.8821 17.7513C46.8821 9.77283 41.06 8 39.7928 8C39.4599 8 39.1638 8.03684 38.8984 8.10744C44.0624 8.43131 47.1721 14.947 45.3925 21.6654C43.9488 27.1174 43.2293 31.4889 45.5873 34.0522C47.1122 35.7115 50.1452 35.429 53.4651 33.7084C53.4636 33.7084 47.2611 34.7214 45.4891 31.9356Z"
                    fill="url(#paint3_linear)"></path>
                <path
                    d="M45.8373 34.7783C42.7997 35.7914 35.1274 38.1751 29.3161 43.4476C14.5883 56.809 39.7329 58.4836 44.926 69.9111C45.9186 72.0953 51.7207 58.456 51.7207 58.456L53.597 55.2971L48.1753 40.852L45.8373 34.7783Z"
                    fill="url(#paint4_linear)"></path>
                <path
                    d="M46.2837 35.9355C43.2461 36.9486 30.8364 44.9026 30.8364 48.8304C30.8364 60.1658 39.4307 54.571 44.0761 67.9464C44.7189 69.799 46.991 71.357 46.991 71.357C48.8734 69.8205 51.7223 58.4559 51.7223 58.4559L53.5985 55.2971L48.1769 40.8519L46.2837 35.9355Z"
                    fill="url(#paint5_linear)"></path>
                <path
                    d="M53.2948 70.6782L59.1092 64.0274L60.3902 36.2438L45.8358 34.7764C42.4944 36.5753 42.1078 39.0358 43.3489 42.9867C43.8706 44.649 41.7488 45.1248 41.6123 49.9675C41.5172 53.3244 43.7141 53.3397 43.7141 54.3374C43.7141 55.3351 42.6202 55.2461 42.2566 58.1364C41.7381 62.2715 45.1991 62.3513 45.1991 63.2354C45.1991 64.1195 43.2768 64.6444 43.395 68.0151C43.5453 72.2899 35.6107 71.4257 30.2458 67.5362C28.0428 65.9384 26.1205 65.7742 24.6201 66.1364C24.7137 66.1318 24.7935 66.1287 24.8533 66.1287C25.8658 66.1287 32.6667 71.5746 38.9045 71.5746C46.1994 71.5746 51.2437 71.1479 53.2948 70.6782Z"
                    fill="url(#paint6_linear)"></path>
                <path
                    d="M54.6325 36.6094C50.139 36.6094 47.6706 41.0023 49.3796 44.3776C51.0886 47.7529 46.2147 52.2211 46.7209 54.4206C47.2272 56.6202 48.1139 62.1873 48.8089 63.1083C49.5054 64.0292 47.669 66.1182 47.669 66.1182L53.3653 66.8151L58.6811 64.4697L58.4909 48.3884L59.06 38.3193L54.6325 36.6094Z"
                    fill="url(#paint7_linear)"></path>
                <path
                    d="M25.869 34.3424C23.4021 37.139 21.2021 37.7453 18.749 37.7223C19.4563 38.8643 19.9487 40.1122 19.8981 41.3325C19.7646 44.5313 20.4688 48.4745 21.0073 44.3732C21.4169 41.2496 23.534 37.3892 26.0807 34.1045C26.0117 34.1828 25.9426 34.2595 25.869 34.3424Z"
                    fill="url(#paint8_linear)"></path>
                <path
                    d="M58.0368 33.5827C52.7241 33.3801 43.1725 33.0792 42.9592 38.648C42.8058 42.6863 45.6685 44.011 50.0961 44.1798C54.5236 44.3487 56.7374 44.4331 58.5707 44.5022C60.404 44.5712 66.1724 44.5375 66.2292 39.661C66.2998 33.5689 58.0368 33.5827 58.0368 33.5827Z"
                    fill="url(#paint9_linear)"></path>
                <path
                    d="M49.2984 53.7131C47.8747 53.6716 43.645 54.7384 43.2492 57.4261C42.9378 59.5397 44.0163 62.2703 47.6967 62.915C52.359 63.7315 60.1279 64.1598 63.0305 63.0731C64.3268 62.588 65.4575 61.2296 65.5173 59.1713C65.5772 57.1129 64.0492 54.3393 60.7277 54.2426C57.4063 54.1475 55.6758 54.1981 53.7827 53.974C51.506 53.7069 50.4367 53.7468 49.2984 53.7131Z"
                    fill="url(#paint10_linear)"></path>
                <path
                    d="M47.8149 63.1064C46.2009 63.1064 44.2065 64.5309 44.2065 66.9054C44.2065 69.2799 44.8233 71.0374 48.2889 71.702C51.7545 72.3667 57.3081 71.7972 59.3961 71.1326C61.0238 70.6138 61.6268 69.0911 61.6268 66.5739C61.6268 64.0566 60.0619 63.616 58.3529 63.616C56.6439 63.616 54.5697 63.9276 53.3853 63.8662C50.0777 63.6913 49.4288 63.1064 47.8149 63.1064Z"
                    fill="url(#paint11_linear)"></path>
                <path
                    d="M57.5844 34.7063C52.9452 34.5297 44.6041 34.2611 44.4368 38.6633C44.3156 41.8559 46.8194 42.9119 50.6854 43.0593C54.5514 43.2066 64.7228 43.3923 64.7566 39.5382C64.798 34.7216 57.5844 34.7063 57.5844 34.7063Z"
                    fill="url(#paint12_linear)"></path>
                <path
                    d="M49.7264 54.8483C48.4868 54.813 45.0166 55.1077 44.6837 57.6756C44.4581 59.4132 45.3587 61.645 48.5635 62.1776C52.6244 62.853 59.3869 63.2152 61.9136 62.3296C63.0412 61.9335 64.0246 60.8238 64.0722 59.1369C64.1213 57.45 62.5672 55.3824 59.6769 55.298C56.7865 55.2136 55.2478 55.4822 53.5986 55.295C51.6165 55.0724 50.7174 54.8759 49.7264 54.8483Z"
                    fill="url(#paint13_linear)"></path>
                <path
                    d="M48.5052 63.9727C47.1091 63.9727 45.3848 65.1192 45.3848 67.0318C45.3848 68.9443 45.9187 70.3595 48.9164 70.8936C51.9141 71.4278 56.7175 70.9704 58.5247 70.4347C59.9315 70.0172 60.4547 68.7908 60.4547 66.7632C60.4547 64.7355 59.1 64.3825 57.6211 64.3825C56.1422 64.3825 54.3488 64.6342 53.324 64.5836C50.4613 64.4439 49.8998 63.9727 48.5052 63.9727Z"
                    fill="url(#paint14_linear)"></path>
                <path
                    d="M47.6538 38.6656C47.7689 35.6326 50.1867 34.179 53.2412 33.5098C48.3656 33.6234 43.1158 34.5351 42.9578 38.6472C42.8044 42.6856 45.6671 44.0102 50.0946 44.179C50.5825 44.1975 51.0412 44.2159 51.4769 44.2312C48.9916 43.5037 47.5326 41.8628 47.6538 38.6656Z"
                    fill="url(#paint15_linear)"></path>
                <path
                    d="M48.071 34.0586C45.2343 34.6787 43.0589 36.0202 42.9592 38.6465C42.8319 42.0034 44.791 43.4846 47.9988 43.9865C41.4911 41.3879 43.826 34.9872 48.071 34.0586Z"
                    fill="url(#paint16_linear)"></path>
                <path
                    d="M40.5169 65.9662C39.7667 67.6899 36.1967 67.7989 32.5424 66.2072C28.8881 64.617 26.5347 61.9294 27.2849 60.2042C28.0351 58.4804 31.605 58.3715 35.2594 59.9632C38.9122 61.5549 41.2671 64.2425 40.5169 65.9662Z"
                    fill="url(#paint17_radial)"></path>
                <path
                    d="M62.0165 39.4799C61.9797 41.81 58.8654 42.9151 55.458 43.1223C52.672 43.2911 49.5792 41.3188 49.659 39.0425C49.7388 36.7662 50.1438 34.7493 55.9336 34.9504C59.3456 35.0686 62.0518 37.2036 62.0165 39.4799Z"
                    fill="url(#paint18_radial)"></path>
                <path
                    d="M62.6347 59.9617C62.6148 63.1881 59.0694 62.5695 55.662 62.7936C51.3419 63.0791 48.4776 61.733 48.4761 59.4551C48.473 57.1773 50.1161 55.518 55.9106 55.5088C59.324 55.5042 62.6593 55.8174 62.6347 59.9617Z"
                    fill="url(#paint19_radial)"></path>
                <path
                    d="M59.5113 68.0967C59.4944 70.8473 56.2727 71.2218 53.2198 71.2234C50.1668 71.2264 46.8531 69.6071 46.8516 67.6654C46.85 65.7237 48.3182 64.3085 53.499 64.3008C56.5504 64.2962 59.5328 64.5633 59.5113 68.0967Z"
                    fill="url(#paint20_radial)"></path>
                <path
                    d="M47.2105 58.0802C47.6953 54.4071 50.512 54.622 53.7414 54.2413C50.0241 53.9635 48.4639 53.9236 48.4639 53.9236C48.1172 53.8898 47.729 53.8883 47.3256 53.9297C46.1182 54.1953 44.7497 54.7448 43.9366 55.7763C43.6605 56.1692 43.4365 56.6327 43.2892 57.1822C43.2739 57.2621 43.2585 57.3434 43.2493 57.4263C42.987 59.5476 44.0164 62.2705 47.6968 62.9152C48.2276 63.0088 48.7999 63.0963 49.3997 63.1777C49.6866 63.2145 49.9996 63.2529 50.3355 63.2959C50.4261 63.3066 50.5166 63.3174 50.6086 63.3281C48.5774 62.3688 46.853 60.7801 47.2105 58.0802Z"
                    fill="url(#paint21_linear)"></path>
                <path
                    d="M48.1093 53.9001C47.8592 53.8924 47.5938 53.9016 47.3223 53.9292C46.1042 54.1978 44.7235 54.755 43.915 55.8034C43.648 56.1902 43.4332 56.6476 43.289 57.1833C43.2737 57.2631 43.2629 57.3429 43.2491 57.4258C42.8763 59.5148 43.9104 61.9769 47.1259 62.7919C41.6398 59.765 43.9809 53.9031 48.1093 53.9001Z"
                    fill="url(#paint22_linear)"></path>
                <path
                    d="M51.3034 63.6672C49.6818 63.4293 49.016 63.1055 47.8163 63.1055C46.2024 63.1055 44.208 64.5299 44.208 66.9044C44.208 67.767 44.2909 68.5468 44.5593 69.2237C44.8324 69.7824 45.2298 70.3058 45.7744 70.7479C46.3727 71.1654 47.1858 71.4892 48.2888 71.701C49.0298 71.8438 49.8675 71.9282 50.745 71.9697C49.0513 70.9858 46.1825 70.4562 46.7838 67.1623C47.4481 63.5245 49.6189 64.0157 51.3034 63.6672Z"
                    fill="url(#paint23_linear)"></path>
                <path
                    d="M47.7442 63.1084C46.1441 63.1498 44.208 64.5666 44.208 66.9058C44.208 69.0808 44.7281 70.7385 47.4804 71.5121C43.1817 68.7492 44.5609 64.0877 47.7442 63.1084Z"
                    fill="url(#paint24_linear)"></path>
                <path
                    d="M66.2293 39.661C66.2355 39.1146 66.1741 38.6188 66.059 38.166C66.487 40.0693 64.7918 41.9604 60.2983 42.8782C57.3205 43.4861 49.412 44.2459 43.9397 42.0724C45.121 43.4999 47.2949 44.0709 50.0962 44.1783C54.5238 44.3472 56.7375 44.4316 58.5709 44.5007C60.4042 44.5728 66.171 44.5375 66.2293 39.661Z"
                    fill="url(#paint25_linear)"></path>
                <path
                    d="M65.5174 59.0422C65.5112 56.9977 63.9786 54.3376 60.7262 54.244C57.4048 54.1488 55.6743 54.1995 53.7812 53.9754C51.506 53.7068 50.4367 53.7467 49.2984 53.7145C48.4377 53.6899 46.3145 53.9493 44.8708 54.8472C46.494 55.4106 49.1388 56.2578 52.8607 56.0199C61.7787 55.4459 64.3161 56.5249 65.5174 59.0422Z"
                    fill="url(#paint26_linear)"></path>
                <path
                    d="M47.3854 44.5003C45.4877 44.4619 42.4731 45.5793 42.3949 49.5225C42.3166 53.4642 45.7638 54.4036 47.2826 54.4343C48.8015 54.465 54.1111 54.8272 60.6604 54.9577C67.2097 55.0881 68.0872 51.5716 68.124 49.7297C68.1608 47.8863 66.9933 44.554 63.0537 44.4742C51.6626 44.2455 47.3854 44.5003 47.3854 44.5003Z"
                    fill="url(#paint27_linear)"></path>
                <path
                    d="M48.4039 45.6439C46.7532 45.6117 44.136 46.4682 44.0761 49.5088C44.0148 52.551 47.014 53.2817 48.3334 53.3078C49.6543 53.3339 54.2705 53.624 59.9637 53.7375C65.6569 53.8511 66.4133 51.1405 66.4409 49.7176C66.47 48.2962 66.2737 45.7237 62.8479 45.6546C52.9481 45.4582 48.4039 45.6439 48.4039 45.6439Z"
                    fill="url(#paint28_linear)"></path>
                <path
                    d="M46.468 49.142C46.6582 45.0945 49.4826 45.0822 52.6706 44.3838C48.9426 44.4068 47.3854 44.4989 47.3854 44.4989C45.4877 44.4605 42.4731 45.578 42.3949 49.5212C42.3166 53.4628 45.7638 54.4022 47.2826 54.4329C47.8303 54.4437 48.872 54.4974 50.2834 54.568C48.1786 53.7008 46.3284 52.1198 46.468 49.142Z"
                    fill="url(#paint29_linear)"></path>
                <path
                    d="M64.7888 49.5613C64.9207 52.7846 61.3416 53.3909 57.9312 53.5536C54.5208 53.7163 50.7299 51.9926 50.621 49.7178C50.512 47.4431 52.0753 45.7087 57.8621 45.4278C61.2725 45.2635 64.62 45.4201 64.7888 49.5613Z"
                    fill="url(#paint30_radial)"></path>
                <path
                    d="M47.0308 44.5068C45.1346 44.6081 42.4683 45.8177 42.3946 49.5214C42.3195 53.2697 45.4307 54.3027 47.0431 54.4209C40.8037 51.9021 42.8488 44.8783 47.0308 44.5068Z"
                    fill="url(#paint31_linear)"></path>
                <path
                    d="M68.113 49.3311C67.2907 55.1637 51.8772 54.0954 43.5483 52.8429C44.6729 54.0478 46.3451 54.4131 47.2824 54.4331C48.8012 54.4638 54.1109 54.826 60.6602 54.9565C67.2094 55.087 68.087 51.5705 68.1238 49.7286C68.1253 49.6027 68.1222 49.4692 68.113 49.3311Z"
                    fill="url(#paint32_linear)"></path>
                <path
                    d="M60.3918 62.3194C57.4063 62.4515 49.507 63.4338 43.7478 60.3471C44.3906 61.5412 45.6348 62.5558 47.6952 62.9165C52.3574 63.7331 60.1263 64.1614 63.0289 63.0746C64.3253 62.5896 65.456 61.2312 65.5158 59.1729C65.324 60.9626 63.6196 62.1767 60.3918 62.3194Z"
                    fill="url(#paint33_linear)"></path>
                <path
                    d="M61.3982 68.8008C59.4422 70.2896 56.0609 71.1692 51.1823 70.3449C48.1693 69.8353 46.1043 69.6619 44.7466 69.625C45.2897 70.6074 46.3375 71.3288 48.2889 71.7033C51.7546 72.3679 57.3082 71.7985 59.3961 71.1338C60.4685 70.79 61.0944 70.0103 61.3982 68.8008Z"
                    fill="url(#paint34_linear)"></path>
                <path
                    d="M44.8479 64.7688C48.4623 63.4518 50.2343 65.4058 54.1019 65.4058C58.1183 65.4058 60.0329 63.7834 61.4596 65.326C61.0117 63.9031 59.7291 63.616 58.353 63.616C56.6439 63.616 54.5698 63.9276 53.3839 63.8662C50.0763 63.6928 49.4289 63.1064 47.8149 63.1064C46.7702 63.1064 45.5674 63.7035 44.8479 64.7688Z"
                    fill="url(#paint35_linear)"></path>
                <path
                    d="M14.7312 67.2694C17.5156 66.8887 23.8455 66.129 24.858 66.129C15.6777 59.5641 19.7601 45.6009 23.1459 38.5388C23.6215 37.5472 23.9145 36.7337 24.0726 36.043C21.0181 38.373 18.1922 37.7007 14.4765 37.3814C8.91061 36.9041 10.8083 67.8051 14.7312 67.2694Z"
                    fill="url(#paint36_linear)"></path>
                <path
                    d="M20.5193 60.9254C19.5697 59.6591 20.392 62.382 21.1529 64.3452C21.7988 66.0152 16.8451 65.0282 13.0542 65.4381C13.5497 66.6614 14.1158 67.3537 14.731 67.2692C17.5155 66.8886 23.8454 66.1288 24.8579 66.1288C23.4296 64.9147 21.4674 62.1917 20.5193 60.9254Z"
                    fill="url(#paint37_linear)"></path>
                <path
                    d="M24.8563 66.131C24.0693 65.4603 23.1197 64.3306 22.2651 63.2393C22.2651 63.2393 17.6566 65.5984 12.7151 64.4887C13.2843 66.2937 13.9685 67.3743 14.7294 67.2699C17.5154 66.8908 23.8438 66.131 24.8563 66.131Z"
                    fill="url(#paint38_linear)"></path>
                <path
                    d="M42.3138 19.8899C40.5096 20.2798 39.0476 17.7871 38.2222 14.8784C37.5472 12.4993 38.4646 9.46934 40.2365 9.12858C42.0085 8.7863 43.6439 8.77094 44.6211 13.8132C45.1949 16.7832 44.078 19.5092 42.3138 19.8899Z"
                    fill="url(#paint39_radial)"></path>
                <path
                    d="M47.7443 63.108C46.7517 63.2124 45.8527 63.745 45.2344 64.4772C44.6069 65.2155 44.3139 66.1794 44.3784 67.148C44.3845 68.1226 44.5318 69.1188 45.0841 69.9078C45.6318 70.7044 46.5522 71.1787 47.4804 71.5118C46.5231 71.2953 45.5213 70.8993 44.88 70.0597C44.2295 69.2293 44.0792 68.1472 44.047 67.1541C44.004 66.138 44.3277 65.0574 45.0442 64.3083C45.7391 63.5516 46.7425 63.0881 47.7443 63.108Z"
                    fill="#804B24"></path>
                <path
                    d="M46.152 54.2734C45.4984 54.5574 44.8955 54.9457 44.3969 55.4292C43.8891 55.9066 43.6191 56.5605 43.4335 57.2236L43.435 57.2128C43.1957 58.4223 43.3982 59.7101 44.1085 60.7155C44.8019 61.7347 45.928 62.4009 47.1246 62.7907C45.8927 62.5528 44.6516 61.9527 43.8722 60.8828C43.4872 60.3563 43.2202 59.7408 43.0913 59.0977C42.9609 58.4546 43.0208 57.7823 43.1404 57.1545L43.1435 57.1437C43.3383 56.4469 43.6851 55.7485 44.2573 55.2773C44.805 54.7907 45.4769 54.4914 46.152 54.2734Z"
                    fill="#804B24"></path>
                <path
                    d="M47.0309 44.5049C45.8573 44.6384 44.722 45.1265 43.9136 45.9477C43.102 46.7689 42.6632 47.9001 42.5927 49.0528C42.4745 50.2009 42.6602 51.3997 43.3168 52.3529C43.9642 53.3091 45.0227 53.9507 46.1549 54.2823C44.9951 54.0705 43.8414 53.4979 43.1081 52.5018C42.3595 51.5133 42.1616 50.2194 42.2613 49.0252C42.3595 47.8249 42.8304 46.6 43.7356 45.7666C44.6315 44.9239 45.8481 44.5172 47.0309 44.5049Z"
                    fill="#804B24"></path>
                <path
                    d="M48.0711 34.0586C46.8162 34.4024 45.5689 34.8767 44.5794 35.6918C43.5822 36.5022 43.0422 37.7532 43.1251 39.0348C43.1082 40.3073 43.5239 41.6058 44.4904 42.4485C45.4431 43.3019 46.7287 43.7164 47.9975 43.9865C46.7103 43.8346 45.371 43.5122 44.3232 42.6404C43.2508 41.7808 42.7952 40.3564 42.7937 39.0379C42.7246 37.6979 43.3276 36.295 44.4199 35.4938C45.4907 34.6726 46.7901 34.2858 48.0711 34.0586Z"
                    fill="#804B24"></path>
                <path
                    d="M43.7493 60.3457C44.613 61.8422 46.2729 62.6174 47.9129 62.8384C49.5821 63.0963 51.2635 63.2728 52.9495 63.3802C54.6325 63.523 56.3216 63.612 58.0107 63.6059C58.8544 63.5951 59.6997 63.5736 60.5389 63.4907C61.3781 63.4232 62.2249 63.3372 63.0319 63.0717C61.4349 63.6719 59.7028 63.767 58.0153 63.8269C56.3185 63.8699 54.6202 63.8223 52.9265 63.7118C51.2359 63.5659 49.5499 63.3526 47.8776 63.0564C47.0369 62.9182 46.1993 62.6573 45.4629 62.2091C44.7296 61.7563 44.1282 61.104 43.7493 60.3457Z"
                    fill="#804B24"></path>
                <path
                    d="M43.5483 52.8428C44.1957 53.4874 45.0288 53.9126 45.8986 54.1291C46.7639 54.3885 47.6737 54.3317 48.588 54.3731L54.048 54.5312L59.505 54.7998C61.3153 54.9103 63.1578 54.9349 64.8929 54.3409C63.2023 55.0623 61.303 55.1206 59.5004 55.0208L54.0404 54.8628L48.5834 54.5926C47.6859 54.5312 46.7424 54.5742 45.8542 54.2841C44.9766 54.0093 44.1559 53.5258 43.5483 52.8428Z"
                    fill="#804B24"></path>
                <path
                    d="M63.0535 44.4734C61.748 44.4765 60.4409 44.5133 59.1353 44.5011L55.2187 44.5087L51.3035 44.5625C49.9995 44.5701 48.6924 44.5778 47.393 44.63H47.3823C46.0982 44.6085 44.7681 45.0475 43.843 45.9669C42.8995 46.8771 42.4546 48.2018 42.3948 49.5218C42.4055 48.8602 42.4761 48.1925 42.6786 47.5525C42.8842 46.914 43.2355 46.3169 43.7126 45.8364C44.6638 44.8587 46.0353 44.3737 47.3884 44.3706H47.3777C49.9934 44.2125 52.606 44.211 55.2187 44.2524C57.8329 44.2816 60.444 44.3307 63.0535 44.4734Z"
                    fill="#804B24"></path>
                <defs>
                    <linearGradient id="paint0_linear" x1="53.6692" y1="39.2608" x2="34.6268" y2="40.0249"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFCB4B"></stop>
                        <stop offset="1" stop-color="#FFD748"></stop>
                    </linearGradient>
                    <linearGradient id="paint1_linear" x1="33.1154" y1="65.6657" x2="32.7325" y2="55.6521"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFCB4B"></stop>
                        <stop offset="1" stop-color="#FFD748"></stop>
                    </linearGradient>
                    <linearGradient id="paint2_linear" x1="30.6742" y1="27.9693" x2="45.0193" y2="48.4791"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFCB4B"></stop>
                        <stop offset="1" stop-color="#FFD748"></stop>
                    </linearGradient>
                    <linearGradient id="paint3_linear" x1="20.2932" y1="19.7978" x2="57.0336" y2="22.5495"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.3118" stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#FF8900"></stop>
                    </linearGradient>
                    <linearGradient id="paint4_linear" x1="19.5935" y1="52.4637" x2="67.8399" y2="52.4637"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#FFA754"></stop>
                    </linearGradient>
                    <linearGradient id="paint5_linear" x1="11.8141" y1="52.5362" x2="107.13" y2="55.5726"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#C86F34"></stop>
                    </linearGradient>
                    <linearGradient id="paint6_linear" x1="26.959" y1="64.9917" x2="42.722" y2="56.4499"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#C86F34"></stop>
                    </linearGradient>
                    <linearGradient id="paint7_linear" x1="45.0161" y1="52.8643" x2="58.1604" y2="51.1381"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#643800" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#643800"></stop>
                    </linearGradient>
                    <linearGradient id="paint8_linear" x1="21.6881" y1="23.8457" x2="24.5391" y2="71.0529"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#FFA754"></stop>
                    </linearGradient>
                    <linearGradient id="paint9_linear" x1="65.3286" y1="39.006" x2="46.6765" y2="39.006"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFBC47"></stop>
                        <stop offset="1" stop-color="#FFD748"></stop>
                    </linearGradient>
                    <linearGradient id="paint10_linear" x1="65.3285" y1="58.7184" x2="46.6661" y2="58.7184"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFBC47"></stop>
                        <stop offset="1" stop-color="#FFD748"></stop>
                    </linearGradient>
                    <linearGradient id="paint11_linear" x1="65.3286" y1="67.5521" x2="46.6765" y2="67.5521"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFBC47"></stop>
                        <stop offset="1" stop-color="#FFD748"></stop>
                    </linearGradient>
                    <linearGradient id="paint12_linear" x1="44.162" y1="39.0984" x2="53.8772" y2="38.877"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFCB4B"></stop>
                        <stop offset="1" stop-color="#FFD748"></stop>
                    </linearGradient>
                    <linearGradient id="paint13_linear" x1="61.1514" y1="58.8499" x2="51.2483" y2="58.8499"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFCB4B"></stop>
                        <stop offset="1" stop-color="#FFD748"></stop>
                    </linearGradient>
                    <linearGradient id="paint14_linear" x1="61.1514" y1="67.5527" x2="51.2483" y2="67.5527"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFCB4B"></stop>
                        <stop offset="1" stop-color="#FFD748"></stop>
                    </linearGradient>
                    <linearGradient id="paint15_linear" x1="49.0629" y1="38.8702" x2="43.779" y2="38.8702"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FBA23B" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#FBA23B"></stop>
                    </linearGradient>
                    <linearGradient id="paint16_linear" x1="48.1134" y1="39.0229" x2="42.0368" y2="39.0229"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFBC47"></stop>
                        <stop offset="1" stop-color="#E89043"></stop>
                    </linearGradient>
                    <radialGradient id="paint17_radial" cx="0" cy="0" r="1"
                        gradientUnits="userSpaceOnUse"
                        gradientTransform="translate(33.4032 61.7573) rotate(23.5251) scale(7.41808 3.44412)">
                        <stop stop-color="#FBE07A"></stop>
                        <stop offset="1" stop-color="#FFD748" stop-opacity="0"></stop>
                    </radialGradient>
                    <radialGradient id="paint18_radial" cx="0" cy="0" r="1"
                        gradientUnits="userSpaceOnUse"
                        gradientTransform="translate(55.8467 39.0525) rotate(2.02718) scale(6.34705 4.16577)">
                        <stop stop-color="#FBE07A"></stop>
                        <stop offset="1" stop-color="#FFD748"></stop>
                    </radialGradient>
                    <radialGradient id="paint19_radial" cx="0" cy="0" r="1"
                        gradientUnits="userSpaceOnUse"
                        gradientTransform="translate(55.5394 59.5052) rotate(-0.0544055) scale(6.81633 3.67452)">
                        <stop stop-color="#FBE07A"></stop>
                        <stop offset="1" stop-color="#FFD748" stop-opacity="0"></stop>
                    </radialGradient>
                    <radialGradient id="paint20_radial" cx="0" cy="0" r="1"
                        gradientUnits="userSpaceOnUse"
                        gradientTransform="translate(53.1813 67.7665) rotate(-0.0539601) scale(6.24091 3.90602)">
                        <stop stop-color="#FBE07A"></stop>
                        <stop offset="1" stop-color="#FFD748" stop-opacity="0"></stop>
                    </radialGradient>
                    <linearGradient id="paint21_linear" x1="49.6959" y1="58.6129" x2="42.0377" y2="58.6129"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FBA23B" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#FBA23B"></stop>
                    </linearGradient>
                    <linearGradient id="paint22_linear" x1="48.068" y1="58.3447" x2="43.9428" y2="58.3447"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFBC47"></stop>
                        <stop offset="1" stop-color="#FBA23B"></stop>
                    </linearGradient>
                    <linearGradient id="paint23_linear" x1="49.4205" y1="67.6029" x2="40.4645" y2="65.9582"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FBA23B" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#FBA23B"></stop>
                    </linearGradient>
                    <linearGradient id="paint24_linear" x1="48.4945" y1="67.3101" x2="44.7089" y2="67.3101"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFBC47"></stop>
                        <stop offset="1" stop-color="#FBA23B"></stop>
                    </linearGradient>
                    <linearGradient id="paint25_linear" x1="54.529" y1="37.8317" x2="56.9364" y2="49.4826"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#C86F34"></stop>
                    </linearGradient>
                    <linearGradient id="paint26_linear" x1="56.3577" y1="60.8509" x2="53.7311" y2="51.3741"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#C86F34"></stop>
                    </linearGradient>
                    <linearGradient id="paint27_linear" x1="65.3287" y1="49.6691" x2="46.6766" y2="49.6691"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFBC47"></stop>
                        <stop offset="1" stop-color="#FFD748"></stop>
                    </linearGradient>
                    <linearGradient id="paint28_linear" x1="45.924" y1="49.1486" x2="60.2119" y2="49.6705"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFCB4B"></stop>
                        <stop offset="0.7382" stop-color="#FFD748"></stop>
                        <stop offset="1" stop-color="#FFCB4B"></stop>
                    </linearGradient>
                    <linearGradient id="paint29_linear" x1="51.4997" y1="49.4764" x2="40.825" y2="49.4764"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FBA23B" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#FBA23B"></stop>
                    </linearGradient>
                    <radialGradient id="paint30_radial" cx="0" cy="0" r="1"
                        gradientUnits="userSpaceOnUse"
                        gradientTransform="translate(57.6977 49.4978) rotate(-2.73606) scale(6.97949 4.58109)">
                        <stop stop-color="#FBE07A"></stop>
                        <stop offset="1" stop-color="#FFD748" stop-opacity="0"></stop>
                    </radialGradient>
                    <linearGradient id="paint31_linear" x1="46.5377" y1="49.4637" x2="43.1673" y2="49.4637"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0.00132565" stop-color="#FFBC47"></stop>
                        <stop offset="1" stop-color="#FBA23B"></stop>
                    </linearGradient>
                    <linearGradient id="paint32_linear" x1="55.414" y1="48.4361" x2="57.4413" y2="61.3219"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#C86F34"></stop>
                    </linearGradient>
                    <linearGradient id="paint33_linear" x1="54.0091" y1="58.4048" x2="59.2033" y2="69.6743"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#C86F34"></stop>
                    </linearGradient>
                    <linearGradient id="paint34_linear" x1="52.9748" y1="68.2908" x2="53.735" y2="75.4145"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#C86F34"></stop>
                    </linearGradient>
                    <linearGradient id="paint35_linear" x1="53.1541" y1="67.2101" x2="53.1541" y2="62.057"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#C86F34"></stop>
                    </linearGradient>
                    <linearGradient id="paint36_linear" x1="18.3641" y1="52.9841" x2="2.21357" y2="77.3875"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#C86F34" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#C86F34"></stop>
                    </linearGradient>
                    <linearGradient id="paint37_linear" x1="17.2977" y1="58.3816" x2="19.9585" y2="70.254"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#C86F34"></stop>
                    </linearGradient>
                    <linearGradient id="paint38_linear" x1="18.9089" y1="60.6097" x2="18.5287" y2="75.142"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFBC47" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#C86F34"></stop>
                    </linearGradient>
                    <radialGradient id="paint39_radial" cx="0" cy="0" r="1"
                        gradientUnits="userSpaceOnUse"
                        gradientTransform="translate(41.4453 14.4772) rotate(79.0714) scale(6.69229 3.92588)">
                        <stop stop-color="#FBE07A"></stop>
                        <stop offset="1" stop-color="#FFD748" stop-opacity="0"></stop>
                    </radialGradient>
                </defs>
            </g>
        </svg>
        <p class="text-xl font-semibold">You may also like</p>
    </div>

    <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-x-3 gap-y-5 py-5">
        <template x-for="product in products" :key="product.id">
            <a :href="'{{ route('customer.product.listing', ':id') }}'.replace(':id', product.id)"
                class="bg-white p-2 rounded hover:shadow-md transition-all duration-300 ease-in-out">
                {{-- product image --}}
                <div class="h-40 w-full relative rounded overflow-hidden">
                    <img :src="product.image" alt="product image" class="bg-cover bg-center h-full w-full">



                    {{-- some actions button such as wishlist --}}
                    <div class="absolute inset-x-0 top-2 flex items-center justify-between">
                        {{--  dislaying products discount --}}
                        <template x-if="product.discount">
                            <div class="border-[10px] border-orange-500 border-r-transparent w-12 relative">
                                <span class="absolute top-1/2 -translate-y-1/2 -left-1 text-white text-xs font-medium"
                                    x-text="product.discount"></span>
                            </div>
                        </template>

                        <button class="ms-auto rounded-full p-1 bg-orange-100 text-orange-500 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- card body --}}
                <div class="py-2 space-y-2">
                    <p class="line-clamp-2" x-text="product.name"></p>

                    <template x-if="product.discount">
                        <div class="flex items-baseline gap-2">
                            <p class="text-orange-500 capitalize text-sm font-medium tracking-wide"
                                x-text="product.sale_price">
                            </p>

                            <p class="line-through text-xs" x-text="product.price"></p>
                        </div>
                    </template>

                    <template x-if="!product.discount">
                        <p class="text-orange-500 capitalize text-sm font-medium tracking-wide"
                            x-text="product.price">
                    </template>

                    <template x-if="product.reviews_count > 0">
                        <div class="flex items-center mt-2">
                            <div class="flex items-center gap-1">
                                <template x-for="i in 5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="size-4 text-orange-500" fill="currentColor">
                                        <path x-show="i <= product.reviews_avg_rating"
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        <path x-show="i > product.reviews_avg_rating"
                                            d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />
                                    </svg>
                                </template>
                            </div>
                            <span class="text-sm ms-2 text-slate-500"
                                x-text="'(' + product.reviews_count +')'"></span>
                        </div>
                    </template>
                </div>
            </a>

        </template>
    </div>

    <div class="flex items-center justify-center pb-5">
        <button @click="getProducts"
            class="border-4 border-slate-200 px-7 py-2 text-sm uppercase font-medium flex items-center gap-3">
            {{-- loading svg --}}
            <svg x-show="loading" x-cloak version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 213.333 213.333" xml:space="preserve"
                class="size-5 animate-spin" fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path style="fill:#2D50A7;"
                        d="M203.636,101.818h-38.788c-5.355,0-9.697,4.342-9.697,9.697s4.342,9.697,9.697,9.697h38.788 c5.355,0,9.697-4.342,9.697-9.697S208.992,101.818,203.636,101.818z">
                    </path>
                    <path style="fill:#73A1FB;"
                        d="M48.485,101.818H9.697c-5.355,0-9.697,4.342-9.697,9.697s4.342,9.697,9.697,9.697h38.788 c5.355,0,9.697-4.342,9.697-9.697S53.84,101.818,48.485,101.818z">
                    </path>
                    <path style="fill:#355EC9;"
                        d="M168.378,36.09l-27.428,27.428c-3.787,3.786-3.787,9.926,0,13.713 c1.893,1.894,4.375,2.841,6.856,2.841c2.482,0,4.964-0.946,6.857-2.841l27.428-27.428c3.787-3.786,3.787-9.926,0-13.713 C178.305,32.303,172.165,32.303,168.378,36.09z">
                    </path>
                    <g>
                        <path style="fill:#C4D9FD;"
                            d="M106.667,169.697c-5.355,0-9.697,4.342-9.697,9.697v19.394c0,5.355,4.342,9.697,9.697,9.697 c5.355,0,9.697-4.342,9.697-9.697v-19.394C116.364,174.039,112.022,169.697,106.667,169.697z">
                        </path>
                        <path style="fill:#C4D9FD;"
                            d="M58.669,145.799l-27.427,27.428c-3.787,3.787-3.787,9.926,0,13.713 c1.893,1.893,4.375,2.84,6.857,2.84c2.482,0,4.964-0.947,6.856-2.84l27.427-27.428c3.787-3.787,3.787-9.926,0-13.713 C68.596,142.012,62.456,142.012,58.669,145.799z">
                        </path>
                    </g>
                    <path style="fill:#3D6DEB;"
                        d="M106.667,4.848c-5.355,0-9.697,4.342-9.697,9.697v38.788c0,5.355,4.342,9.697,9.697,9.697 c5.355,0,9.697-4.342,9.697-9.697V14.545C116.364,9.19,112.022,4.848,106.667,4.848z">
                    </path>
                    <path style="fill:#5286FA;"
                        d="M44.956,36.09c-3.786-3.787-9.926-3.787-13.713,0c-3.787,3.787-3.787,9.926,0,13.713l27.427,27.428 c1.893,1.894,4.375,2.841,6.857,2.841c2.481,0,4.964-0.947,6.856-2.841c3.787-3.786,3.787-9.926,0-13.713L44.956,36.09z">
                    </path>
                </g>
            </svg>
            <span> Show More</span>
        </button>

    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('productList', () => ({
                products: @json($products),
                prevNumber: 24,
                loading: false,

                async getProducts() {
                    try {
                        this.loading = true;
                        const response = await axios.get('{{ route('customer.products.list') }}', {
                            params: {
                                prevNumber: this.prevNumber,
                            }
                        });

                        if (response.status == 200) {
                            this.loading = false;
                            this.products = response.data.products;
                            this.prevNumber = response.data.prevNumber;
                        }
                    } catch (error) {
                        this.loading = false;
                        console.log(error)
                    }
                },

                init() {

                }
            }))
        })
    </script>
@endPush
