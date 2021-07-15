<template>
    <div>
        <span @click="generate_pdf" type="button" title="Generar informe" class="btn btn-success btn-md"><i class="fas fa-download"></i></span>
    </div>
</template>

<script>
    import pdfMake from "pdfmake/build/pdfmake";
    import pdfFonts from "pdfmake/build/vfs_fonts";
    pdfMake.vfs = pdfFonts.pdfMake.vfs;   
    export default {
        props: ["bomb_test"],
        
        data() {
            return {
                docDefinition: {
                    compress: false,
                    pageSize: "LETTER",
                    pageMargins: [30, 20, 30, 20],
                    footer: {
                        table: {
                            heights: 0,
                            headerRows: 1,
                            widths: ["*"],
                            body: 
                            [
                                [
                                    {
                                        alignment: "center",
                                        bold: true,
                                        border: [false, false, false, false],
                                        color: "#000000",
                                        fontSize: 11,
                                        fillColor: "#dadada",
                                        margin: [0, 0, 0, 0],
                                        text: 'Pruebas bombeo'
                                    }
                                ]
                            ]
                        }
                    },
                    content: [],
                    styles: {
                        header: {
                            bold: true,
                            fontSize: 18
                        },
                        body_table_header: {
                            alignment: "center",
                            border: [false, false, false, false],
                            color: "#000",
                            fillColor: "#b6dcff",
                            fontSize: 12
                        },
                        body_table: {
                            alignment: "center",
                            border: [false, true, false, false],
                            color: "#000000",
                            fillColor: "#dadad3",
                            fontSize: 12
                        }
                    }
                }
            };
        },

        methods: {
            async generate_pdf() {
                   
                this.docDefinition.content = [
                    {
                        columns: [
                            {
                                border: [false, false, false, false],
                                text: "",
                                width: 40
                            },
                            {
                                alignment: "center",
                                color: "#000",
                                margin: [0, 20, 0, 0],
                                style: "header",
                                text: 'Informe prueba de bombeo',
                                width: "*",
                            },
                            {
                                border: [false, false, false, false],
                                text: "",
                                width: 40
                            }
                        ]
                    },
                    {
                        bold: true,
                        border: [false, false, false, false],
                        color: "#FF0000",
                        margin: [6, 0, 0, 0],
                        fontSize: 20,
                        text: "____________________________________________________________"
                    },
                    {
                        margin: [0, 10, 0, 0],
                        table: {
                            heights: 0,
                            widths: [500],
                            body:
                            [
                                {
                                    table: {
                                        heights: 0,
                                        widths: [500],
                                        body: [
                                            [
                                                {
                                                    text: "Fecha", 
                                                },
                                                {
                                                    text: "Fecha", 
                                                },
                                                {
                                                    text: "Prueba", 
                                                },
                                                {
                                                    text: "prueba", 
                                                },
                                                {
                                                    text: "Profundidad segun diseño", 
                                                },
                                                {
                                                    text: "Profundidad segun diseño", 
                                                },
                                            ],
                                            [
                                                {
                                                    text: "Fecha", 
                                                },
                                                {
                                                    text: "Fecha", 
                                                },
                                                {
                                                    text: "Prueba", 
                                                },
                                                {
                                                    text: "prueba", 
                                                },
                                                {
                                                    text: "Profundidad segun diseño", 
                                                },
                                                {
                                                    text: "Profundidad segun diseño", 
                                                },
                                            ],
                                            [
                                                {
                                                    text: "Fecha", 
                                                },
                                                {
                                                    text: "Fecha", 
                                                },
                                                {
                                                    text: "Prueba", 
                                                },
                                                {
                                                    text: "prueba", 
                                                },
                                                {
                                                    text: "Profundidad segun diseño", 
                                                },
                                                {
                                                    text: "Profundidad segun diseño", 
                                                },
                                            ]
                                        ]
                                    }
                                }
                            ]
                        }
                    }
                ];

                pdfMake.createPdf(this.docDefinition).download('Informe prueba de bombeo');
            },
        }
    };
</script>