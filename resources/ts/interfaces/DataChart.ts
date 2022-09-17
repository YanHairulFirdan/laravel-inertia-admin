export default interface DataChart{
  labels: Array<string>,
  datasets: Array<{
    label: String,
    data: Array<number | Number>
  }>
}