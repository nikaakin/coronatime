/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                blue: {
                    750: "#2029F3",
                },
                green: {
                    550: "#0FBA68",
                    650: "#249E2C",
                },
                slate: {
                    970: "#010414",
                },
                zinc: {
                    550: "#808189",
                },
                neutral: {
                    250: "#E6E6E7",
                },
                red: {
                    750: "#CC1E1E",
                },
                yellow: {
                    450: "#EAD621",
                },
            },
            boxShadow: {
                focused:
                    "-3px 3px 0px #DBE8FB, -3px -3px 0px #DBE8FB, 3px -3px 0px #DBE8FB, 3px 3px 0px #DBE8FB, 3px 3px 0px #DBE8FB",
            },
            fontFamily: {
                inter: ["Inter", "sans-serif"],
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
