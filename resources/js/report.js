import $ from "jquery";
import Chart from "chart.js/auto";
import ChartDataLabels from "chartjs-plugin-datalabels";

Chart.register(ChartDataLabels);

$(document).ready(function () {
    const canvas = document.getElementById("scoreChart");
    if (!canvas) {
        console.error("Error: Canvas element not found");
        return;
    }

    const labels = JSON.parse(canvas.dataset.labels);
    const gte8Data = JSON.parse(canvas.dataset.gte8);
    const gte6Lt8Data = JSON.parse(canvas.dataset.gte6Lt8);
    const gte4Lt6Data = JSON.parse(canvas.dataset.gte4Lt6);
    const lt4Data = JSON.parse(canvas.dataset.lt4);

    if (!labels || !gte8Data || !gte6Lt8Data || !gte4Lt6Data || !lt4Data) {
        console.error("Error: Missing chart data");
        return;
    }

    const chart = new Chart(canvas.getContext("2d"), {
        type: "bar",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "≥ 8 (Excellent)",
                    data: gte8Data,
                    backgroundColor: "rgba(34, 197, 94, 0.6)",
                    borderColor: "rgba(34, 197, 94, 1)",
                    borderWidth: 1,
                    stack: "Stack 0",
                },
                {
                    label: "6-8 (Good)",
                    data: gte6Lt8Data,
                    backgroundColor: "rgba(59, 130, 246, 0.6)",
                    borderColor: "rgba(59, 130, 246, 1)",
                    borderWidth: 1,
                    stack: "Stack 0",
                },
                {
                    label: "4-6 (Average)",
                    data: gte4Lt6Data,
                    backgroundColor: "rgba(245, 158, 11, 0.6)",
                    borderColor: "rgba(245, 158, 11, 1)",
                    borderWidth: 1,
                    stack: "Stack 0",
                },
                {
                    label: "< 4 (Below Average)",
                    data: lt4Data,
                    backgroundColor: "rgba(239, 68, 68, 0.6)",
                    borderColor: "rgba(239, 68, 68, 1)",
                    borderWidth: 1,
                    stack: "Stack 0",
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    color: "#000",
                    anchor: "center",
                    align: "center",
                    formatter: (value, context) => {
                        return value > 0 ? value : "";
                    },
                    font: {
                        weight: "bold",
                        size: 12,
                    },
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.dataset.label || "";
                            if (label) {
                                label += ": ";
                            }
                            label += context.parsed.y;
                            return label + " students";
                        },
                    },
                },
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "Score Distribution by Subject",
                },
            },
            scales: {
                x: {
                    stacked: true,
                    title: {
                        display: true,
                        text: "Subjects",
                    },
                },
                y: {
                    stacked: true,
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "Number of Students",
                    },
                    ticks: {
                        stepSize: 50,
                    },
                },
            },
        },
    });
});
